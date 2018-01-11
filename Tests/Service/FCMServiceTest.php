<?php

namespace Firebase\Bundle\CloudMessagingBundle\Tests\Service;

use Firebase\Bundle\CloudMessagingBundle\Http\Request;
use Firebase\Bundle\CloudMessagingBundle\Http\Response;
use Firebase\Bundle\CloudMessagingBundle\Serializer\Denormalizer\Response\ResultDenormalizer;
use Firebase\Bundle\CloudMessagingBundle\Serializer\Denormalizer\ResponseDenormalizer;
use Firebase\Bundle\CloudMessagingBundle\Serializer\Normalizer\Request\Notification\AndroidNormalizer;
use Firebase\Bundle\CloudMessagingBundle\Serializer\Normalizer\Request\Notification\IOSNormalizer;
use Firebase\Bundle\CloudMessagingBundle\Serializer\Normalizer\Request\Notification\WebNormalizer;
use Firebase\Bundle\CloudMessagingBundle\Serializer\Normalizer\RequestNormalizer;
use Firebase\Bundle\CloudMessagingBundle\Service\FCMService;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class FCMServiceTest extends WebTestCase
{
    /**
     * @group firebase
     * @group fsm-service
     */
    public function testCanSendMessage()
    {
        $serializer = new Serializer([
            new RequestNormalizer(),
            new AndroidNormalizer(),
            new IOSNormalizer(),
            new WebNormalizer(),
            new ResponseDenormalizer(),
            new ResultDenormalizer()
        ], [
            new JsonEncoder(),
            new JsonDecode()
        ]);

        $client = $this->createMock(Client::class);
        $client
            ->expects($this->once())
            ->method('__call')
            ->with('post', ['https://fcm.googleapis.com/fcm/send', ['body' => '{"to":"drhmEFw8E_8:APA91bEIbR93j_xKHpnBIzdRnk3JfuHnOs3883ekpI0FeDd_41r-VfX4MDNAKodOxpRNMJC89mzX3dfUWbPSgHeKyKlrc9V6X6podGYJLAunubxZAHe0IAe2va_PhV7veAJM53SXegdl","notification":{"title":"Unit test","body":"Body unit test"}}']])
            ->willReturn(new \GuzzleHttp\Psr7\Response('200', [], '{}'));

        /** @var FCMService $fcmService */
        $fcmService = new FCMService($client, $serializer);

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
