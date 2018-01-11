<?php

namespace Firebase\Bundle\CloudMessagingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('firebase');
        $rootNode
            ->children()
                ->arrayNode('cloud_messaging')
                    ->children()
                        ->scalarNode('key')->isRequired()->end()
                    ->end()
                ->end()
            ->end();
        return $treeBuilder;
    }
}
