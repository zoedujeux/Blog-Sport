<?php

namespace ZD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZDAdminBundle:Admin:index.html.twig');
    }
}
