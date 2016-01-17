<?php

namespace ZD\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ZD\UserBundle\Entity\FormRegister;


class UserController extends Controller{
     
    public function registerAction (Request $request)
    {
  
//        $register = new FormRegister();
//
//        
//        $form = $this->get('form.factory')->createBuilder('form', $register)
//
//          ->add('name',      'text')
//          ->add('email',     'email')
//          ->add('password',   'password')
//          ->add('save',      'submit')
//          ->getForm()
//        ;
//
//        $form = handleRequest($request);
//        
//        if ($form->isValid()) {
//       
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($register);
//        $em->flush();
//
//        $request->getSession()->getFlashBag()->add('notice', 'Vous avez bien été enregistré.');
//
//       
//        return $this->redirect($this->generateUrl('zd_blog_register', array('id' => $register->getId())));
//      }
//
//      
//     
//      return $this->render('ZDBlogBundle:Article:register.html.twig', array(
//        'form' => $form->createView(),
//      ));

        return $this->render('ZDUserBundle:User:register.html.twig');
    }
    
     public function loginAction (Request $request)
    {

    }
}
