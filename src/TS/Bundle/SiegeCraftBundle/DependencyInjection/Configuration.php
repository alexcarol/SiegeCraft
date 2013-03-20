<?php

namespace TS\Bundle\SiegeCraftBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ts_siege_craft');

        $this->addTabs($rootNode);

        return $treeBuilder;
    }

    private function addTabs(NodeDefinition $rootNode) {
        $rootNode
            ->children()
                ->arrayNode('tabs')
                    ->prototype('boolean')
                ->end()
            ->end();
    }
}
