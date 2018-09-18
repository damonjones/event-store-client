<?php
/**
 * This file is part of the prooph/event-store-client.
 * (c) 2018-2018 prooph software GmbH <contact@prooph.de>
 * (c) 2018-2018 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStoreClient\Projections;

use Amp\Promise;
use Prooph\EventStoreClient\EndPoint;
use Prooph\EventStoreClient\Exception\InvalidArgumentException;
use Prooph\EventStoreClient\Transport\Http\EndpointExtensions;
use Prooph\EventStoreClient\UserCredentials;

class ProjectionsManager
{
    /** @var ProjectionsClient */
    private $client;
    /** @var EndPoint */
    private $httpEndPoint;
    /** @var string */
    private $httpSchema;

    public function __construct(
        EndPoint $httpEndPoint,
        int $operationTimeout,
        string $httpSchema = EndpointExtensions::HTTP_SCHEMA
    ) {
        $this->client = new ProjectionsClient($operationTimeout);
        $this->httpEndPoint = $httpEndPoint;
        $this->httpSchema = $httpSchema;
    }

    /**
     * Asynchronously enables a projection
     */
    public function enableAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->enable(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously aborts and disables a projection without writing a checkpoint
     */
    public function disableAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->disable(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously disables a projection
     */
    public function abortAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->abort(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously creates a one-time query
     */
    public function createOneTimeAsync(
        string $query,
        string $type = 'JS',
        UserCredentials $userCredentials = null
    ): Promise {
        if ('' === $query) {
            throw new InvalidArgumentException('Query is required');
        }

        return $this->client->createOneTime(
            $this->httpEndPoint,
            $query,
            $type,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously creates a one-time query
     */
    public function createTransientAsync(
        string $name,
        string $query,
        string $type = 'JS',
        UserCredentials $userCredentials = null
    ): Promise {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        if ('' === $query) {
            throw new InvalidArgumentException('Query is required');
        }

        return $this->client->createTransient(
            $this->httpEndPoint,
            $name,
            $query,
            $type,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously creates a continuous projection
     */
    public function createContinuousAsync(
        string $name,
        string $query,
        bool $trackEmittedStreams = null,
        string $type = 'JS',
        UserCredentials $userCredentials = null
    ): Promise {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        if ('' === $query) {
            throw new InvalidArgumentException('Query is required');
        }

        return $this->client->createContinuous(
            $this->httpEndPoint,
            $name,
            $query,
            $trackEmittedStreams,
            $type,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously lists all projections
     *
     * @return Promise<ProjectionDetails[]>
     */
    public function listAllAsync(UserCredentials $userCredentials = null): Promise
    {
        return $this->client->listAll(
            $this->httpEndPoint,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously lists all one-time projections
     *
     * @return Promise<ProjectionDetails[]>
     */
    public function listOneTimeAsync(UserCredentials $userCredentials = null): Promise
    {
        return $this->client->listOneTime(
            $this->httpEndPoint,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously lists this status of all continuous projections
     *
     * @return Promise<ProjectionDetails[]>
     */
    public function listContinuousAsync(UserCredentials $userCredentials = null): Promise
    {
        return $this->client->listContinuous(
            $this->httpEndPoint,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously gets the status of a projection
     *
     * returns String of JSON containing projection status
     *
     * @return Promise<string>
     */
    public function getStatusAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->getStatus(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously gets the state of a projection.
     *
     * returns String of JSON containing projection state
     *
     * @return Promise<string>
     */
    public function getStateAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->getState(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously gets the state of a projection for a specified partition
     *
     * returns String of JSON containing projection state
     *
     * @return Promise<string>
     */
    public function getPartitionStateAsync(
        string $name,
        string $partition,
        UserCredentials $userCredentials = null
    ): Promise {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        if ('' === $partition) {
            throw new InvalidArgumentException('Partition is required');
        }

        return $this->client->getPartitionState(
            $this->httpEndPoint,
            $name,
            $partition,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously gets the resut of a projection
     *
     * returns String of JSON containing projection result
     *
     * @return Promise<string>
     */
    public function getResultAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->getResult(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously gets the result of a projection for a specified partition
     *
     * returns String of JSON containing projection result
     *
     * @return Promise<string>
     */
    public function getPartitionResultAsync(
        string $name,
        string $partition,
        UserCredentials $userCredentials = null
    ): Promise {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        if ('' === $partition) {
            throw new InvalidArgumentException('Partition is required');
        }

        return $this->client->getPartitionResult(
            $this->httpEndPoint,
            $name,
            $partition,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously gets the statistics of a projection
     *
     * returns String of JSON containing projection statistics
     *
     * @return Promise<string>
     */
    public function getStatisticsAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->getStatistics(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously gets the status of a query
     *
     * @return Promise<string>
     */
    public function getQueryAsync(string $name, UserCredentials $userCredentials = null): Promise
    {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->getQuery(
            $this->httpEndPoint,
            $name,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously updates the definition of a query
     */
    public function updateQueryAsync(
        string $name,
        string $query,
        bool $emitEnabled = null,
        string $type = 'JS',
        UserCredentials $userCredentials = null
    ): Promise {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        if ('' === $query) {
            throw new InvalidArgumentException('Query is required');
        }

        return $this->client->updateQuery(
            $this->httpEndPoint,
            $name,
            $query,
            $emitEnabled,
            $type,
            $userCredentials,
            $this->httpSchema
        );
    }

    /**
     * Asynchronously deletes a projection
     */
    public function deleteAsync(
        string $name,
        bool $deleteEmittedStreams = false,
        UserCredentials $userCredentials = null
    ): Promise {
        if ('' === $name) {
            throw new InvalidArgumentException('Name is required');
        }

        return $this->client->delete(
            $this->httpEndPoint,
            $name,
            $deleteEmittedStreams,
            $userCredentials,
            $this->httpSchema
        );
    }
}
