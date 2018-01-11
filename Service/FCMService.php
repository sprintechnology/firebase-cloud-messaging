<?php

namespace Firebase\Bundle\CloudMessagingBundle\Service;

use Firebase\Bundle\CloudMessagingBundle\Http\Request;
use Firebase\Bundle\CloudMessagingBundle\Http\Response;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class FCMService
 * @package Firebase\Bundle\CloudMessagingBundle\Service
 */
class FCMService
{
    private static $uri = 'https://fcm.googleapis.com/fcm/send';

    /** @var  Client */
    protected $client;

    /** @var  Serializer */
    protected $serializer;

    /**
     * FCMService constructor.
     * @param Client $client
     * @param SerializerInterface $serializer
     */
    public function __construct(Client $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function send(Request $request)
    {
        $data = $this->serializer->serialize($request, 'json');

        $response = $this->client->post(self::$uri, [
            'body' => $data
        ]);

        return $this->serializer->deserialize($response->getBody()->getContents(), Response::class, 'json');
    }
}
