<?php

namespace Fivestar\AssetsExtraBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Fivestar\AssetsExtraBundle\DependencyInjection\Compiler\TemplatingAssetsPass;

/**
 * FivestarAssetsExtraBundle.
 *
 * @author Katsuhiro Ogawa <ko.fivestar@gmail.com>
 */
class FivestarAssetsExtraBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TemplatingAssetsPass());
    }
}
