<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http\Request;

class AbstractNotification implements NotificationInterface
{
    /**
     * The notification's title.
     * @var string|null
     */
    protected $title;

    /**
     * The notification's body text.
     * @var string|null
     */
    protected $body;

    /**
     * The action associated with a user click on the notification.
     * @var string|null
     */
    protected $clickAction;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getClickAction()
    {
        return $this->clickAction;
    }

    /**
     * @param string $clickAction
     */
    public function setClickAction(string $clickAction)
    {
        $this->clickAction = $clickAction;
    }
}
