<?php

/**
 * This file is part of `prooph/event-store-client`.
 * (c) 2018-2019 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2018-2019 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ProophTest\EventStoreClient;

use Amp\Deferred;
use Amp\Promise;
use Amp\Success;
use Generator;
use PHPUnit\Framework\TestCase;
use Prooph\EventStore\Async\EventAppearedOnPersistentSubscription;
use Prooph\EventStore\Async\EventStorePersistentSubscription;
use Prooph\EventStore\Async\PersistentSubscriptionDropped;
use Prooph\EventStore\EventData;
use Prooph\EventStore\ExpectedVersion;
use Prooph\EventStore\PersistentSubscriptionSettings;
use Prooph\EventStore\ResolvedEvent;
use Prooph\EventStore\SubscriptionDropReason;
use Prooph\EventStore\Util\Guid;
use Throwable;

class update_existing_persistent_subscription_with_subscribers extends TestCase
{
    use SpecificationWithConnection;

    /** @var string */
    private $stream;
    /** @var PersistentSubscriptionSettings */
    private $settings;
    /** @var Deferred */
    private $dropped;
    /** @var SubscriptionDropReason */
    private $reason;
    /** @var Throwable */
    private $exception;
    /** @var Throwable */
    private $caught;

    protected function given(): Generator
    {
        $this->stream = Guid::generateAsHex();
        $this->settings = PersistentSubscriptionSettings::create()
            ->doNotResolveLinkTos()
            ->startFromCurrent()->build();
        $this->dropped = new Deferred();

        yield $this->conn->appendToStreamAsync(
            $this->stream,
            ExpectedVersion::ANY,
            [new EventData(null, 'whatever', true, '{"foo": 2}')]
        );

        yield $this->conn->createPersistentSubscriptionAsync(
            $this->stream,
            'existing',
            $this->settings,
            DefaultData::adminCredentials()
        );

        yield $this->conn->connectToPersistentSubscriptionAsync(
            $this->stream,
            'existing',
            new class() implements EventAppearedOnPersistentSubscription {
                public function __invoke(
                    EventStorePersistentSubscription $subscription,
                    ResolvedEvent $resolvedEvent,
                    ?int $retryCount = null
                ): Promise {
                    return new Success();
                }
            },
            new class($this->dropped, $this->reason, $this->exception) implements PersistentSubscriptionDropped {
                /** @var Deferred */
                private $dropped;
                /** @var SubscriptionDropReason */
                private $reason;
                /** @var Throwable */
                private $exception;

                public function __construct($dropped, &$reason, &$exception)
                {
                    $this->dropped = $dropped;
                    $this->reason = &$reason;
                    $this->exception = &$exception;
                }

                public function __invoke(
                    EventStorePersistentSubscription $subscription,
                    SubscriptionDropReason $reason,
                    ?Throwable $exception = null
                ): void {
                    $this->reason = $reason;
                    $this->exception = $exception;
                    $this->dropped->resolve(true);
                }
            }
        );
    }

    protected function when(): Generator
    {
        try {
            yield $this->conn->updatePersistentSubscriptionAsync(
                $this->stream,
                'existing',
                $this->settings,
                DefaultData::adminCredentials()
            );
        } catch (Throwable $ex) {
            $this->caught = $ex;
        }
    }

    /**
     * @test
     * @throws Throwable
     */
    public function the_completion_succeeds(): void
    {
        $this->execute(function () {
            $this->assertNull($this->caught);

            yield new Success();
        });
    }

    /**
     * @test
     * @throws Throwable
     */
    public function existing_subscriptions_are_dropped(): void
    {
        $this->execute(function () {
            $this->assertTrue(yield Promise\timeout($this->dropped->promise(), 5000));
            $this->assertInstanceOf(SubscriptionDropReason::class, $this->reason);
            $this->assertTrue($this->reason->equals(SubscriptionDropReason::userInitiated()));
            $this->assertNull($this->exception);
        });
    }
}
