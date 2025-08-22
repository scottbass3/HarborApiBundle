<?php

namespace Scottbass3\HarborApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class Scottbass3HarborApiExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.xml');
    }

    public function getNamespace(): string
    {
        return 'http://scottbass3.com/schema/dic/harbor_api';
    }

    public function getXsdValidationBasePath(): string
    {
        return __DIR__.'/../Resources/config/schema';
    }
}