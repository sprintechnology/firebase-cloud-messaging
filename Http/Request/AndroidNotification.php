<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http\Request;

class AndroidNotification extends AbstractNotification
{
    /**
     * The notification's icon.
     * Sets the notification icon to myicon for drawable resource myicon.
     * If you don't send this key in the request, FCM displays the launcher icon specified in your app manifest.
     * @var string|null
     */
    protected $icon;

    /**
     * The sound to play when the device receives the notification.
     * Supports "default" or the filename of a sound resource bundled in the app. Sound files must reside in /res/raw/.
     * @var string|null
     */
    protected $sound;

    /**
     * Identifier used to replace existing notifications in the notification drawer.
     * If not specified, each request creates a new notification.
     * If specified and a notification with the same tag is already being shown, the new notification replaces the existing one in the notification drawer.
     * @var string|null
     */
    protected $tag;

    /**
     * The notification's icon color, expressed in #rrggbb format.
     * @var string|null
     */
    protected $color;

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
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param null|string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

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
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param null|string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return null|string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param null|string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
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
