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
        $treeBuilder = new TreeBuilder();
        $root = $treeBuilder->root('happyr_linkedin');

        $root->children()
            ->scalarNode('http_client')->info('A service id for a Httplug adapter')->end()
            ->scalarNode('app_id')->isRequired()->end()
            ->scalarNode('app_secret')->isRequired()->end()
            ->scalarNode('request_format')->cannotBeEmpty()->defaultValue('json')->end()
            ->scalarNode('response_format')->cannotBeEmpty()->defaultValue('array')->end()
        ->end();

        return $treeBuilder;
    }
}
