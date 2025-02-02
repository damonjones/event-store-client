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
 * Generated from protobuf message <code>Prooph.EventStoreClient.Messages.ClientMessages.TransactionWriteCompleted</code>
 */
class TransactionWriteCompleted extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 transaction_id = 1;</code>
     */
    private $transaction_id = 0;
    /**
     * Generated from protobuf field <code>.Prooph.EventStoreClient.Messages.ClientMessages.OperationResult result = 2;</code>
     */
    private $result = 0;
    /**
     * Generated from protobuf field <code>string message = 3;</code>
     */
    private $message = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $transaction_id
     *     @type int $result
     *     @type string $message
     * }
     */
    public function __construct($data = null)
    {
        \GPBMetadata\ClientMessageDtos::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int64 transaction_id = 1;</code>
     * @return int|string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Generated from protobuf field <code>int64 transaction_id = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTransactionId($var)
    {
        GPBUtil::checkInt64($var);
        $this->transaction_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Prooph.EventStoreClient.Messages.ClientMessages.OperationResult result = 2;</code>
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Generated from protobuf field <code>.Prooph.EventStoreClient.Messages.ClientMessages.OperationResult result = 2;</code>
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
     * Generated from protobuf field <code>string message = 3;</code>
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Generated from protobuf field <code>string message = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setMessage($var)
    {
        GPBUtil::checkString($var, true);
        $this->message = $var;

        return $this;
    }
}
