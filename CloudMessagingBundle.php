<?php

namespace Firebase\Bundle\CloudMessagingBundle;

use Firebase\Bundle\CloudMessagingBundle\DependencyInjection\CloudMessagingExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CloudMessagingBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new CloudMessagingExtension();
    }
}
