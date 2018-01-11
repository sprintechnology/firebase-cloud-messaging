<?php

namespace Firebase\Bundle\CloudMessagingBundle\Tests\Serializer\Normalizer;

use Firebase\Bundle\CloudMessagingBundle\Http\Request;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Serializer\Serializer;

class RequestNormalizerTest extends WebTestCase
{
    /** @var  Container */
    protected $container;

    public function setUp()
    {
        $client = self::createClient();
        $this->container = $client->getContainer();
    }

    /**
     * @group firebase
     * @group firebase-normalizer
     */
    public function testCanNormalizeRequest()
    {
        /** @var Serializer $serializer */
        $serializer = $this->container->get('serializer');

        $request = new Request();
        $request->setTo($to = 'testto');
        $request->setRegistrationIds([$registrationId1 = 'registrationId1', $registrationId2 = 'registrationId2']);
        $request->setCondition($condition = 'condition');
        $request->setCollapseKey($collapseKey = 'collapsekey');
        $request->setPriority($priority = 'high');
        $request->setContentAvailable($contentAvailable = 'contentavailable');
        $request->setMutableContent($mutableContent = true);
        $request->setTimeToLive($timeToLive = 4);
        $request->setRestrictedPackageName($restrictedPackageName = 'restrictedpackagename');
        $request->setDryRun($dryRun = true);
        $request->setDatas([
            'A' => 'B',
            'C' => 'D'
        ]);

        $notification = new Request\IOSNotification();
        $notification->setTitle($notificationTitle = 'notificationTitle');
        $notification->setBody($notificationBody = 'notificationBody');

        $request->setNotification($notification);

        $result = $serializer->serialize($request, 'json', ['json_encode_options' => JSON_PRETTY_PRINT]);

        $json = <<<EOT
{
    "to": "$to",
    "registration_ids": [
        "$registrationId1",
        "$registrationId2"
    ],
    "condition": "$condition",
    "collapse_key": "$collapseKey",
    "priority": "$priority",
    "content_available": "$contentAvailable",
    "mutable_content": true,
    "time_to_live": $timeToLive,
    "restricted_package_name": "$restrictedPackageName",
    "data": {
        "A": "B",
        "C": "D"
    },
    "notification": {
        "title": "$notificationTitle",
        "body": "$notificationBody"
    }
}
EOT;

        $this->assertEquals($json, $result);
    }
}
