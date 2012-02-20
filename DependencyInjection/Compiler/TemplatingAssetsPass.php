<?php

namespace Fivestar\AssetsExtraBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * TemplatingAssets compiler pass.
 *
 * @author Katsuhiro Ogawa <ko.fivestar@gmail.com>
 */
class TemplatingAssetsPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('templating.helper.assets')) {
            return;
        }

        $definition = $container->getDefinition('templating.helper.assets');

        $namedPackages = $definition->getArgument(1);
        $namedPackages['request'] = $container->getDefinition('fivestar_assets_extra.asset.request_package');

        $definition->replaceArgument(1, $namedPackages);
    }
}
