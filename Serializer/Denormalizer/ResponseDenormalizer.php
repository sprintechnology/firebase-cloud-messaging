<?php

namespace Firebase\Bundle\CloudMessagingBundle\Serializer\Denormalizer;

use Firebase\Bundle\CloudMessagingBundle\Http\Response;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ResponseDenormalizer implements DenormalizerInterface, SerializerAwareInterface
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
        /** @var Response $response */
        $response = new $class();

        if (array_key_exists('multicast_id', $data)) {
            $response->setMulticastId($data['multicast_id']);
        }

        if (array_key_exists('success', $data)) {
            $response->setSuccess($data['success']);
        }

        if (array_key_exists('failure', $data)) {
            $response->setFailure($data['failure']);
        }

        if (array_key_exists('failure', $data)) {
            $response->setFailure($data['failure']);
        }

        if (array_key_exists('canonical_ids', $data)) {
            $response->setCanonicalIds($data['canonical_ids']);
        }

        if (array_key_exists('canonical_ids', $data)) {
            $response->setCanonicalIds($data['canonical_ids']);
        }

        if (array_key_exists('results', $data)) {
            $results = [];
            foreach ($data['results'] as $result) {
                $results[] = $this->serializer->denormalize($result, Response\Result::class, $format);
            }
            $response->setResults($results);
        }

        return $response;
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
        return Response::class == $type;
    }
}
