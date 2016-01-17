<?php

namespace ZD\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends BaseController 
{
    public function RegistrationAction(Request $request)
    {
         return $this->render('ZDUserBundle:User:register.html.twig');
    }
}
