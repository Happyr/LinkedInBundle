<?php

namespace Happyr\LinkedInBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('happyr_linkedin');
        $root = $treeBuilder->getRootNode();

        $root->children()
            ->scalarNode('http_client')->defaultValue('httplug.client')->info('A service id for a Httplug adapter')->end()
            ->scalarNode('http_message_factory')->defaultValue('httplug.message_factory')->info('A service id for a Httplug adapter')->end()
            ->scalarNode('app_id')->isRequired()->end()
            ->scalarNode('app_secret')->isRequired()->end()
            ->scalarNode('request_format')->cannotBeEmpty()->defaultValue('json')->end()
            ->scalarNode('response_format')->cannotBeEmpty()->defaultValue('array')->end()
        ->end();

        return $treeBuilder;
    }
}
