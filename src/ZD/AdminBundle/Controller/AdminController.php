<?php

namespace ZD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZD\AdminBundle\Entity\Day;
use ZD\AdminBundle\Form\DayType;
use ZD\AdminBundle\Entity\Home;
use ZD\AdminBundle\Form\HomeType;

class AdminController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('ZDAdminBundle:Admin:index.html.twig');
    }
    
    public function viewHomeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $home = $em->getRepository('ZDAdminBundle:Home')->find($id);

        // On vérifie que l'annonce avec cet id existe bien
        if ($home === null) {
          throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
        }

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
        return $this->render('ZDAdminBundle:Admin:viewHome.html.twig', array(
          'home'           => $home,
        ));
  
    }
    
    public function addHomeAction(Request $request)
    {
        $home = new Home();
        $form = $this->createForm(new HomeType(), $home);

        if ($form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($home);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', ' Bien ajouté.');

        return $this->redirect($this->generateUrl('zd_admin_viewHome', array('id' => $home->getId())));
      }

      // À ce stade, le formulaire n'est pas valide car :
      // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
      // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
      return $this->render('ZDAdminBundle:Admin:addHome.html.twig', array(
        'form' => $form->createView(),
      ));
    }
    
    public function weekAction()
    {
        return $this->render('ZDAdminBundle:Admin:week.html.twig');
    }
    
    public function addDayAction(Request $request)
    {
        $day= new Day();
        $form = $this->get('form.factory')->create(new DayType(), $day);

         dump ($day);
        die();
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
