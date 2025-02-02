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

namespace Prooph\EventStoreClient\Messages\ClientMessages;

use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Prooph.EventStoreClient.Messages.ClientMessages.WriteEventsCompleted</code>
 */
class WriteEventsCompleted extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.Prooph.EventStoreClient.Messages.ClientMessages.OperationResult result = 1;</code>
     */
    private $result = 0;
    /**
     * Generated from protobuf field <code>string message = 2;</code>
     */
    private $message = '';
    /**
     * Generated from protobuf field <code>int64 first_event_number = 3;</code>
     */
    private $first_event_number = 0;
    /**
     * Generated from protobuf field <code>int64 last_event_number = 4;</code>
     */
    private $last_event_number = 0;
    /**
     * Generated from protobuf field <code>int64 prepare_position = 5;</code>
     */
    private $prepare_position = 0;
    /**
     * Generated from protobuf field <code>int64 commit_position = 6;</code>
     */
    private $commit_position = 0;
    /**
     * Generated from protobuf field <code>int64 current_version = 7;</code>
     */
    private $current_version = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $result
     *     @type string $message
     *     @type int|string $first_event_number
     *     @type int|string $last_event_number
     *     @type int|string $prepare_position
     *     @type int|string $commit_position
     *     @type int|string $current_version
     * }
     */
    public function __construct($data = null)
    {
        \GPBMetadata\ClientMessageDtos::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.Prooph.EventStoreClient.Messages.ClientMessages.OperationResult result = 1;</code>
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Generated from protobuf field <code>.Prooph.EventStoreClient.Messages.ClientMessages.OperationResult result = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setResult($var)
    {
        GPBUtil::checkEnum($var, \Prooph\EventStoreClient\Messages\ClientMessages\OperationResult::class);
        $this->result = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string message = 2;</code>
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Generated from protobuf field <code>string message = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMessage($var)
    {
        GPBUtil::checkString($var, true);
        $this->message = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 first_event_number = 3;</code>
     * @return int|string
     */
    public function getFirstEventNumber()
    {
        return $this->first_event_number;
    }

    /**
     * Generated from protobuf field <code>int64 first_event_number = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setFirstEventNumber($var)
    {
        GPBUtil::checkInt64($var);
        $this->first_event_number = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 last_event_number = 4;</code>
     * @return int|string
     */
    public function getLastEventNumber()
    {
        return $this->last_event_number;
    }

    /**
     * Generated from protobuf field <code>int64 last_event_number = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setLastEventNumber($var)
    {
        GPBUtil::checkInt64($var);
        $this->last_event_number = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 prepare_position = 5;</code>
     * @return int|string
     */
    public function getPreparePosition()
    {
        return $this->prepare_position;
    }

    /**
     * Generated from protobuf field <code>int64 prepare_position = 5;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPreparePosition($var)
    {
        GPBUtil::checkInt64($var);
        $this->prepare_position = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 commit_position = 6;</code>
     * @return int|string
     */
    public function getCommitPosition()
    {
        return $this->commit_position;
    }

    /**
     * Generated from protobuf field <code>int64 commit_position = 6;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCommitPosition($var)
    {
        GPBUtil::checkInt64($var);
        $this->commit_position = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 current_version = 7;</code>
     * @return int|string
     */
    public function getCurrentVersion()
    {
        return $this->current_version;
    }

    /**
     * Generated from protobuf field <code>int64 current_version = 7;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCurrentVersion($var)
    {
        GPBUtil::checkInt64($var);
        $this->current_version = $var;

        return $this;
    }
}
