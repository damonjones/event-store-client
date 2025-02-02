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
 * Generated from protobuf message <code>Prooph.EventStoreClient.Messages.ClientMessages.EventRecord</code>
 */
class EventRecord extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string event_stream_id = 1;</code>
     */
    private $event_stream_id = '';
    /**
     * Generated from protobuf field <code>int64 event_number = 2;</code>
     */
    private $event_number = 0;
    /**
     * Generated from protobuf field <code>bytes event_id = 3;</code>
     */
    private $event_id = '';
    /**
     * Generated from protobuf field <code>string event_type = 4;</code>
     */
    private $event_type = '';
    /**
     * Generated from protobuf field <code>int32 data_content_type = 5;</code>
     */
    private $data_content_type = 0;
    /**
     * Generated from protobuf field <code>int32 metadata_content_type = 6;</code>
     */
    private $metadata_content_type = 0;
    /**
     * Generated from protobuf field <code>bytes data = 7;</code>
     */
    private $data = '';
    /**
     * Generated from protobuf field <code>bytes metadata = 8;</code>
     */
    private $metadata = '';
    /**
     * Generated from protobuf field <code>int64 created = 9;</code>
     */
    private $created = 0;
    /**
     * Generated from protobuf field <code>int64 created_epoch = 10;</code>
     */
    private $created_epoch = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $event_stream_id
     *     @type int|string $event_number
     *     @type string $event_id
     *     @type string $event_type
     *     @type int $data_content_type
     *     @type int $metadata_content_type
     *     @type string $data
     *     @type string $metadata
     *     @type int|string $created
     *     @type int|string $created_epoch
     * }
     */
    public function __construct($data = null)
    {
        \GPBMetadata\ClientMessageDtos::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string event_stream_id = 1;</code>
     * @return string
     */
    public function getEventStreamId()
    {
        return $this->event_stream_id;
    }

    /**
     * Generated from protobuf field <code>string event_stream_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setEventStreamId($var)
    {
        GPBUtil::checkString($var, true);
        $this->event_stream_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 event_number = 2;</code>
     * @return int|string
     */
    public function getEventNumber()
    {
        return $this->event_number;
    }

    /**
     * Generated from protobuf field <code>int64 event_number = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setEventNumber($var)
    {
        GPBUtil::checkInt64($var);
        $this->event_number = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes event_id = 3;</code>
     * @return string
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Generated from protobuf field <code>bytes event_id = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setEventId($var)
    {
        GPBUtil::checkString($var, false);
        $this->event_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string event_type = 4;</code>
     * @return string
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * Generated from protobuf field <code>string event_type = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setEventType($var)
    {
        GPBUtil::checkString($var, true);
        $this->event_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 data_content_type = 5;</code>
     * @return int
     */
    public function getDataContentType()
    {
        return $this->data_content_type;
    }

    /**
     * Generated from protobuf field <code>int32 data_content_type = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setDataContentType($var)
    {
        GPBUtil::checkInt32($var);
        $this->data_content_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 metadata_content_type = 6;</code>
     * @return int
     */
    public function getMetadataContentType()
    {
        return $this->metadata_content_type;
    }

    /**
     * Generated from protobuf field <code>int32 metadata_content_type = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setMetadataContentType($var)
    {
        GPBUtil::checkInt32($var);
        $this->metadata_content_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes data = 7;</code>
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Generated from protobuf field <code>bytes data = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setData($var)
    {
        GPBUtil::checkString($var, false);
        $this->data = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes metadata = 8;</code>
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Generated from protobuf field <code>bytes metadata = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setMetadata($var)
    {
        GPBUtil::checkString($var, false);
        $this->metadata = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 created = 9;</code>
     * @return int|string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Generated from protobuf field <code>int64 created = 9;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCreated($var)
    {
        GPBUtil::checkInt64($var);
        $this->created = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 created_epoch = 10;</code>
     * @return int|string
     */
    public function getCreatedEpoch()
    {
        return $this->created_epoch;
    }

    /**
     * Generated from protobuf field <code>int64 created_epoch = 10;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCreatedEpoch($var)
    {
        GPBUtil::checkInt64($var);
        $this->created_epoch = $var;

        return $this;
    }
}
