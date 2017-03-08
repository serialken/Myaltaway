<?php

namespace Altaway\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AltawayAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataAdminBundle';
    }
}
