<?php

namespace Altaway\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AltawayUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
