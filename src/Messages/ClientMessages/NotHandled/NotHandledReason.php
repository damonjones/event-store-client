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
// Generated by the protocol buffer compiler.  DO NOT EDIT!
// source: ClientMessageDtos.proto

namespace Prooph\EventStoreClient\Messages\ClientMessages\NotHandled;

use UnexpectedValueException;

/**
 * Protobuf type <code>Prooph.EventStoreClient.Messages.ClientMessages.NotHandled.NotHandledReason</code>
 */
class NotHandledReason
{
    /**
     * Generated from protobuf enum <code>NotReady = 0;</code>
     */
    const NotReady = 0;
    /**
     * Generated from protobuf enum <code>TooBusy = 1;</code>
     */
    const TooBusy = 1;
    /**
     * Generated from protobuf enum <code>NotMaster = 2;</code>
     */
    const NotMaster = 2;

    private static $valueToName = [
        self::NotReady => 'NotReady',
        self::TooBusy => 'TooBusy',
        self::NotMaster => 'NotMaster',
    ];

    public static function name($value)
    {
        if (! isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(\sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }

        return self::$valueToName[$value];
    }

    public static function value($name)
    {
        $const = __CLASS__ . '::' . \strtoupper($name);
        if (! \defined($const)) {
            throw new UnexpectedValueException(\sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }

        return \constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(NotHandledReason::class, \Prooph\EventStoreClient\Messages\ClientMessages\NotHandled_NotHandledReason::class);
