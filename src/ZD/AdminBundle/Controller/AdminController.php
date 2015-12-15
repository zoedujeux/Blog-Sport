<?php

namespace ZD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZD\AdminBundle\Entity\Day;
use ZD\AdminBundle\Form\DayType;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZDAdminBundle:Admin:index.html.twig');
    }
    
    public function weekAction()
    {
        return $this->render('ZDAdminBundle:Admin:week.html.twig');
    }
    
    public function addDayAction(Request $request)
    {
        $day= new Day();
        $form = $this->get('form.factory')->create(new DayType(), $day);

        if ($form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($day);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Jour bien enregistrée.');

          return $this->redirect($this->generateUrl('zd_admin_view', array('id' => $day->getId())));
        }

        return $this->render('ZDAdminBundle:Admin:day.html.twig', array(
          'form' => $form->createView(),
        ));
    }
}
