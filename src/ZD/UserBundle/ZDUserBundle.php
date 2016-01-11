<?php

namespace ZD\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ZDUserBundle extends Bundle
{
      public function getParent()
        {
          return 'FOSUserBundle';
        }
}
