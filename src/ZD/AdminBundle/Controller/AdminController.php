<?php

namespace ZD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller 
{
     public function indexAction()
    {

          return $this->render('ZDAdminBundle:Admin:index.html.twig', array(
            'index' => $index
            ));
    }
}
