<?php

namespace Firebase\Bundle\CloudMessagingBundle\Serializer\Normalizer\Request\Notification;

use Firebase\Bundle\CloudMessagingBundle\Http\Request\WebNotification;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WebNormalizer implements NormalizerInterface
{

    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param WebNotification $object object to normalize
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

        if ($object->getIcon() != null) {
            $data['icon'] = $object->getIcon();
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
        return is_object($data) && $data instanceof WebNotification;
    }
}
