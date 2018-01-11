<?php

namespace Firebase\Bundle\CloudMessagingBundle\Serializer\Normalizer;

use Firebase\Bundle\CloudMessagingBundle\Http\Request;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

class RequestNormalizer implements NormalizerInterface, SerializerAwareInterface
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
     * @param Request $object object to normalize
     * @param string $format format the normalization result will be encoded as
     * @param array $context Context options for the normalizer
     *
     * @return array
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = [];
        if ($object->getTo() != null) {
            $data['to'] = $object->getTo();
        }
        if ($object->getRegistrationIds() != null) {
            $data['registration_ids'] = $object->getRegistrationIds();
        }
        if ($object->getCondition() != null) {
            $data['condition'] = $object->getCondition();
        }
        if ($object->getCollapseKey() != null) {
            $data['collapse_key'] = $object->getCollapseKey();
        }
        if ($object->getPriority() != null) {
            $data['priority'] = $object->getPriority();
        }
        if ($object->getPriority() != null) {
            $data['priority'] = $object->getPriority();
        }
        if ($object->getContentAvailable() != null) {
            $data['content_available'] = $object->getContentAvailable();
        }
        if ($object->getMutableContent() != null) {
            $data['mutable_content'] = $object->getMutableContent();
        }
        if ($object->getTimeToLive() != null) {
            $data['time_to_live'] = $object->getTimeToLive();
        }
        if ($object->getRestrictedPackageName() != null) {
            $data['restricted_package_name'] = $object->getRestrictedPackageName();
        }
        if (!empty($object->getDatas())) {
            $data['data'] = [];
            foreach ($object->getDatas() as $key => $value) {
                $data['data'][$key] = $value;
            }
        }
        if ($object->getNotification() != null) {
            $data['notification'] = $this->serializer->normalize($object->getNotification(), $format, $context);
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
        return is_object($data) && $data instanceof Request;
    }
}
