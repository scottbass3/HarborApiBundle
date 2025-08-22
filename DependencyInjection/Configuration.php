<?php

namespace Scottbass3\HarborApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('harbor_api');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->fixXmlConfig('base-uri')
            ->fixXmlConfig('username')
            ->fixXmlConfig('password');

        return $treeBuilder;
    }
}