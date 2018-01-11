<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http\Request;

class WebNotification extends AbstractNotification
{
    /**
     * The URL to use for the notification's icon.
     * @var string|null
     */
    protected $icon;

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
}
