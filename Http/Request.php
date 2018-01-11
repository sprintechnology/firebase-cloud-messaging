<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http;

use Firebase\Bundle\CloudMessagingBundle\Http\Request\NotificationInterface;

class Request
{
    /**
     * This parameter specifies the recipient of a message.
     * @var string|null
     */
    protected $to;

    /**
     * This parameter specifies the recipient of a multicast message, a message sent to more than one registration token.
     * @var array|null
     */
    protected $registrationIds;

    /**
     * This parameter specifies a logical expression of conditions that determine the message target.
     * @var string|null
     */
    protected $condition;

    /**
     * This parameter identifies a group of messages (e.g., with collapse_key: "Updates Available") that can be collapsed,
     * so that only the last message gets sent when delivery can be resumed.
     * This is intended to avoid sending too many of the same messages when the device comes back online or becomes active.
     * @var string|null
     */
    protected $collapseKey;

    /**
     * Sets the priority of the message. Valid values are "normal" and "high." On iOS, these correspond to APNs priorities 5 and 10.
     * @var string|null
     */
    protected $priority;

    /**
     * On iOS, use this field to represent content-available in the APNs payload.
     * When a notification or message is sent and this is set to true, an inactive client app is awoken.
     * On Android, data messages wake the app by default. On Chrome, currently not supported.
     * @var boolean|null
     */
    protected $contentAvailable;

    /**
     * Currently for iOS 10+ devices only. On iOS, use this field to represent mutable-content in the APNS payload.
     * When a notification is sent and this is set to true, the content of the notification can be modified before it is displayed, using a Notification Service app extension.
     * This parameter will be ignored for Android and web.
     * @var boolean|string|null
     */
    protected $mutableContent;

    /**
     * This parameter specifies how long (in seconds) the message should be kept in FCM storage if the device is offline.
     * The maximum time to live supported is 4 weeks, and the default value is 4 weeks.
     * @var int|null
     */
    protected $timeToLive;

    /**
     * This parameter specifies the package name of the application where the registration tokens must match in order to receive the message.
     * @var string|null
     */
    protected $restrictedPackageName;

    /**
     * This parameter, when set to true, allows developers to test a request without actually sending a message.
     * The default value is false.
     * @var boolean|null
     */
    protected $dryRun;

    /**
     * This parameter specifies the custom key-value pairs of the message's payload.
     * @var array|null
     */
    protected $datas;

    /**
     * @var NotificationInterface|null
     */
    protected $notification;

    /**
     * @return null|string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param null|string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return array|null
     */
    public function getRegistrationIds()
    {
        return $this->registrationIds;
    }

    /**
     * @param array|null $registrationIds
     */
    public function setRegistrationIds($registrationIds)
    {
        $this->registrationIds = $registrationIds;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     */
    public function setCondition(string $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return null|string
     */
    public function getCollapseKey()
    {
        return $this->collapseKey;
    }

    /**
     * @param null|string $collapseKey
     */
    public function setCollapseKey($collapseKey)
    {
        $this->collapseKey = $collapseKey;
    }

    /**
     * @return null|string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param null|string $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return bool|null
     */
    public function getContentAvailable()
    {
        return $this->contentAvailable;
    }

    /**
     * @param bool|null $contentAvailable
     */
    public function setContentAvailable($contentAvailable)
    {
        $this->contentAvailable = $contentAvailable;
    }

    /**
     * @return bool|null|string
     */
    public function getMutableContent()
    {
        return $this->mutableContent;
    }

    /**
     * @param bool|null|string $mutableContent
     */
    public function setMutableContent($mutableContent)
    {
        $this->mutableContent = $mutableContent;
    }

    /**
     * @return int|null
     */
    public function getTimeToLive()
    {
        return $this->timeToLive;
    }

    /**
     * @param int|null $timeToLive
     */
    public function setTimeToLive($timeToLive)
    {
        $this->timeToLive = $timeToLive;
    }

    /**
     * @return null|string
     */
    public function getRestrictedPackageName()
    {
        return $this->restrictedPackageName;
    }

    /**
     * @param null|string $restrictedPackageName
     */
    public function setRestrictedPackageName($restrictedPackageName)
    {
        $this->restrictedPackageName = $restrictedPackageName;
    }

    /**
     * @return bool|null
     */
    public function getDryRun()
    {
        return $this->dryRun;
    }

    /**
     * @param bool|null $dryRun
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
    }

    /**
     * @return array
     */
    public function getDatas()
    {
        return $this->datas;
    }

    /**
     * @param array $datas
     */
    public function setDatas(array $datas)
    {
        $this->datas = $datas;
    }

    /**
     * @return NotificationInterface
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param NotificationInterface $notification
     */
    public function setNotification(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }
}
