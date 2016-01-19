<?php

namespace ZD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZD\AdminBundle\Entity\Week;
use ZD\AdminBundle\Form\WeekType;


class WeekController extends Controller

{

    
    public function viewWeekAction($weekId, Request $request)
    {

      $em = $this->getDoctrine()->getManager();

      $week = $em->getRepository('ZDAdminBundle:Week')->findOneBy(['weekId'=>$weekId]);

 
      if ($week === null) 
     {
        $week = new Week();
        $week->setWeekId($weekId);

//        if ($request->isMethod('POST')) {
//          return $this->redirect($this->generateUrl('zd_admin_viewWeek1', array('weekId' => $week->getWeekId())));
//
//         }
       // return $this->render('ZDAdminBundle:Admin:viewWeek.html.twig');
     }
     
     //cree le form
     
     //je handle request
     
     //Je affiche le form..
     
        $form = $this->createForm(new WeekType(), $week);

        
        if ($form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($week);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', ' Bien ajouté.');

        return $this->redirect($this->generateUrl('zd_week_viewWeek', array('weekId' => $week->getWeekId())));
      }

      return $this->render('ZDAdminBundle:Admin:addWeek.html.twig', array(
        'form' => $form->createView(),
        'week'=> $week,
      ));
        
      
    }
    
}
