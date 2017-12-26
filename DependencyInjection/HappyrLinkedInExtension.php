<?php

namespace Happyr\LinkedInBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class HappyrLinkedInExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        foreach ($config as $key => $value) {
            $container->setParameter('happyr.linkedin.'.$key, $value);
        }

        if (!empty($config['http_client'])) {
            $def = $container->getDefinition('happyr.linkedin');
            $def->addMethodCall('setHttpClient', [new Reference($config['http_client'])]);
        }

        if (!empty($config['http_message_factory'])) {
            $def = $container->getDefinition('happyr.linkedin');
            $def->addMethodCall('setHttpMessageFactory', [new Reference($config['http_message_factory'])]);
        }
    }

    public function getAlias()
    {
        return 'happyr_linkedin';
    }
}
