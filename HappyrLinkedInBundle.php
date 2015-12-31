<?php

namespace Happyr\LinkedInBundle;

use Happyr\LinkedInBundle\DependencyInjection\HappyrLinkedInExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class HappyrLinkedInBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new HappyrLinkedInExtension();
    }
}
