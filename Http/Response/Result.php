<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http\Response;

class Result
{
    /**
     * String specifying a unique ID for each successfully processed message.
     * @var string|null
     */
    protected $messageId;

    /**
     * Optional string specifying the canonical registration token for the client app that the message was processed and sent to.
     * Sender should use this value as the registration token for future requests.
     * Otherwise, the messages might be rejected.
     * @var string|null
     */
    protected $registrationId;

    /**
     * String specifying the error that occurred when processing the message for the recipient.
     * @var string|null
     */
    protected $error;

    /**
     * @return string
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param string $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return string
     */
    public function getRegistrationId()
    {
        return $this->registrationId;
    }

    /**
     * @param string $registrationId
     */
    public function setRegistrationId($registrationId)
    {
        $this->registrationId = $registrationId;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}
