<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http;

use Firebase\Bundle\CloudMessagingBundle\Http\Response\Result;

class Response
{
    /**
     * Unique ID (number) identifying the multicast message.
     * @var int
     */
    protected $multicastId;

    /**
     * Number of messages that were processed without an error.
     * @var int
     */
    protected $success;

    /**
     * Number of messages that could not be processed.
     * @var int
     */
    protected $failure;

    /**
     * Number of results that contain a canonical registration token.
     * A canonical registration ID is the registration token of the last registration requested by the client app.
     * This is the ID that the server should use when sending messages to the device.
     * @var int
     */
    protected $canonicalIds;

    /**
     * Array of objects representing the status of the messages processed.
     * @var Result[]
     */
    protected $results;

    /**
     * @return int
     */
    public function getMulticastId(): int
    {
        return $this->multicastId;
    }

    /**
     * @param int $multicastId
     */
    public function setMulticastId(int $multicastId)
    {
        $this->multicastId = $multicastId;
    }

    /**
     * @return int
     */
    public function getSuccess(): int
    {
        return $this->success;
    }

    /**
     * @param int $success
     */
    public function setSuccess(int $success)
    {
        $this->success = $success;
    }

    /**
     * @return int
     */
    public function getFailure(): int
    {
        return $this->failure;
    }

    /**
     * @param int $failure
     */
    public function setFailure(int $failure)
    {
        $this->failure = $failure;
    }

    /**
     * @return int
     */
    public function getCanonicalIds(): int
    {
        return $this->canonicalIds;
    }

    /**
     * @param int $canonicalIds
     */
    public function setCanonicalIds(int $canonicalIds)
    {
        $this->canonicalIds = $canonicalIds;
    }

    /**
     * @return Response\Result[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param Response\Result[] $results
     */
    public function setResults(array $results)
    {
        $this->results = $results;
    }
}
