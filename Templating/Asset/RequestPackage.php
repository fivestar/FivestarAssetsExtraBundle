<?php

namespace Fivestar\AssetsExtraBundle\Templating\Asset;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage;

/**
 * RequestPackage.
 *
 * @author Katsuhiro Ogawa <ko.fivestar@gmail.com>
 */
class RequestPackage extends PathPackage
{
    protected $domain;

    /**
     * Constructor.
     *
     * @param Request $request The current request
     * @param string  $version The version
     * @param string  $format  The version format
     */
    public function __construct(Request $request, $version = null, $format = null)
    {
        $this->domain = $request->getScheme().'://'.$request->getHttpHost();

        parent::__construct($request, $version, $format);
    }

    public function getUrl($path)
    {
        return $this->domain . parent::getUrl($path);
    }
}
