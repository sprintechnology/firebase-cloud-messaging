<?php

namespace Firebase\Bundle\CloudMessagingBundle\Serializer\Normalizer\Request\Notification;

use Firebase\Bundle\CloudMessagingBundle\Http\Request\IOSNotification;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

class IOSNormalizer implements NormalizerInterface, SerializerAwareInterface
{
    /** @var SerializerInterface|Serializer */
    protected $serializer;

    /**
     * Sets the owning Serializer object.
     *
     * @param SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param IOSNotification $object object to normalize
     * @param string $format format the normalization result will be encoded as
     * @param array $context Context options for the normalizer
     *
     * @return array
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = [];

        if ($object->getTitle() != null) {
            $data['title'] = $object->getTitle();
        }

        if ($object->getBody() != null) {
            $data['body'] = $object->getBody();
        }

        if ($object->getClickAction() != null) {
            $data['click_action'] = $object->getClickAction();
        }

        if ($object->getSound() != null) {
            $data['sound'] = $object->getSound();
        }

        if ($object->getBadge() != null) {
            $data['badge'] = $object->getBadge();
        }

        if ($object->getBodyLocKey() != null) {
            $data['body_loc_key'] = $object->getBodyLocKey();
        }

        if ($object->getBodyLocArgs() != null) {
            $data['body_loc_args'] = $object->getBodyLocArgs();
        }

        if ($object->getTitleLocKey() != null) {
            $data['title_loc_key'] = $object->getTitleLocKey();
        }

        if ($object->getTitleLocArgs() != null) {
            $data['title_loc_args'] = $object->getTitleLocArgs();
        }

        return $data;
    }

    /**
     * Checks whether the given class is supported for normalization by this normalizer.
     *
     * @param mixed $data Data to normalize.
     * @param string $format The format being (de-)serialized from or into.
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && $data instanceof IOSNotification;
    }
}
