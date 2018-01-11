<?php

namespace Firebase\Bundle\CloudMessagingBundle\Serializer\Denormalizer\Response;

use Firebase\Bundle\CloudMessagingBundle\Http\Response\Result;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ResultDenormalizer implements DenormalizerInterface
{

    /**
     * Denormalizes data back into an object of the given class.
     *
     * @param mixed $data data to restore
     * @param string $class the expected class to instantiate
     * @param string $format format the given data was extracted from
     * @param array $context options available to the denormalizer
     *
     * @return object
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        /** @var Result $result */
        $result = new $class();

        if (array_key_exists('message_id', $data)) {
            $result->setMessageId($data['message_id']);
        }

        if (array_key_exists('registration_id', $data)) {
            $result->setRegistrationId($data['registration_id']);
        }

        if (array_key_exists('error', $data)) {
            $result->setError($data['error']);
        }

        return $result;
    }

    /**
     * Checks whether the given class is supported for denormalization by this normalizer.
     *
     * @param mixed $data Data to denormalize from
     * @param string $type The class to which the data should be denormalized
     * @param string $format The format being deserialized from
     *
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return Result::class == $type;
    }
}
