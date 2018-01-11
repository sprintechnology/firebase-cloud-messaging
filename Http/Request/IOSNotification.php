<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http\Request;

class IOSNotification extends AbstractNotification
{
    /**
     * The sound to play when the device receives the notification.
     * Sound files can be in the main bundle of the client app or in the Library/Sounds folder of the app's data container.
     * @var string|null
     */
    protected $sound;

    /**
     * The value of the badge on the home screen app icon.
     * If not specified, the badge is not changed.
     * If set to 0, the badge is removed.
     * @var string|null
     */
    protected $badge;

    /**
     * The key to the body string in the app's string resources to use to localize the body text to the user's current localization.
     * @var string|null
     */
    protected $bodyLocKey;

    /**
     * Variable string values to be used in place of the format specifiers in body_loc_key to use to localize the body text to the user's current localization.
     * @var array|null
     */
    protected $bodyLocArgs;

    /**
     * The key to the title string in the app's string resources to use to localize the title text to the user's current localization.
     * @var string|null
     */
    protected $titleLocKey;

    /**
     * Variable string values to be used in place of the format specifiers in title_loc_key to use to localize the title text to the user's current localization.
     * @var array|null
     */
    protected $titleLocArgs;

    /**
     * @return null|string
     */
    public function getSound()
    {
        return $this->sound;
    }

    /**
     * @param null|string $sound
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
    }

    /**
     * @return null|string
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @param null|string $badge
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;
    }

    /**
     * @return null|string
     */
    public function getBodyLocKey()
    {
        return $this->bodyLocKey;
    }

    /**
     * @param null|string $bodyLocKey
     */
    public function setBodyLocKey($bodyLocKey)
    {
        $this->bodyLocKey = $bodyLocKey;
    }

    /**
     * @return array|null
     */
    public function getBodyLocArgs()
    {
        return $this->bodyLocArgs;
    }

    /**
     * @param array|null $bodyLocArgs
     */
    public function setBodyLocArgs($bodyLocArgs)
    {
        $this->bodyLocArgs = $bodyLocArgs;
    }

    /**
     * @return null|string
     */
    public function getTitleLocKey()
    {
        return $this->titleLocKey;
    }

    /**
     * @param null|string $titleLocKey
     */
    public function setTitleLocKey($titleLocKey)
    {
        $this->titleLocKey = $titleLocKey;
    }

    /**
     * @return array|null
     */
    public function getTitleLocArgs()
    {
        return $this->titleLocArgs;
    }

    /**
     * @param array|null $titleLocArgs
     */
    public function setTitleLocArgs($titleLocArgs)
    {
        $this->titleLocArgs = $titleLocArgs;
    }
}
