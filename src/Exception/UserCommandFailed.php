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

namespace Prooph\EventStoreClient\Exception;

use Prooph\EventStore\Exception\UserCommandFailed as BaseException;

class UserCommandFailed extends BaseException
{
    /** @var int */
    private $httpStatusCode;

    public function __construct(int $httpStatusCode, string $message)
    {
        $this->httpStatusCode = $httpStatusCode;

        parent::__construct($message);
    }

    public function httpStatusCode(): int
    {
        return $this->httpStatusCode;
    }
}
