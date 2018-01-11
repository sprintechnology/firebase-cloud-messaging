<?php

namespace Firebase\Bundle\CloudMessagingBundle\Tests\Service;

use Firebase\Bundle\CloudMessagingBundle\Http\Request;
use Firebase\Bundle\CloudMessagingBundle\Http\Response;
use Firebase\Bundle\CloudMessagingBundle\Service\FCMService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FCMServiceTest extends WebTestCase
{
    protected $container;

    public function setUp()
    {
        $client = self::createClient();
        $this->container = $client->getContainer();
    }

    /**
     * @group firebase
     * @group fsm-service
     */
    public function testCanSendMessage()
    {
        /** @var FCMService $fcmService */
        $fcmService = $this->container->get('firebase.cloud_messaging.service');

        $request = new Request();
        $request->setTo('drhmEFw8E_8:APA91bEIbR93j_xKHpnBIzdRnk3JfuHnOs3883ekpI0FeDd_41r-VfX4MDNAKodOxpRNMJC89mzX3dfUWbPSgHeKyKlrc9V6X6podGYJLAunubxZAHe0IAe2va_PhV7veAJM53SXegdl');

        $notification = new Request\IOSNotification();
        $notification->setTitle('Unit test');
        $notification->setBody('Body unit test');
        $request->setNotification($notification);

        $response = $fcmService->send($request);

        $this->assertInstanceOf(Response::class, $response);
    }
}
