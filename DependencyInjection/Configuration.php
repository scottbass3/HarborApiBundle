<?php

namespace Scottbass3\HarborApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('scottbass3_harbor_api');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('base_uri')
                    ->info('URI of the harbor server.')
                    ->defaultValue('')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('login')
                    ->info('Login to authenticate on harbor API')
                    ->defaultValue('')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('password')
                    ->info('Password to authenticate on harbor API')
                    ->defaultValue('')
                    ->cannotBeEmpty()
                ->end()
            ->end()
        ;


        return $treeBuilder;
    }
}