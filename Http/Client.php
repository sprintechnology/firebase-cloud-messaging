<?php

namespace Firebase\Bundle\CloudMessagingBundle\Http;

class Client extends \Guzzle\Http\Client
{
    private static $uri = 'https://fcm.googleapis.com/fcm/send';

    /**
     * Client constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $config = [
            'base_url' => self::$uri,
            'headers' => [
                'Authorization' => 'key=' . $key,
                'Content-Type' => 'application/json'
            ]
        ];

        parent::__construct($config);
    }
}
