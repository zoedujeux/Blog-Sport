<?php

namespace ZD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZD\AdminBundle\Entity\Day;
use ZD\AdminBundle\Form\DayType;
use ZD\AdminBundle\Entity\Home;
use ZD\AdminBundle\Form\HomeType;
use ZD\AdminBundle\Entity\HomeEdit;
use ZD\AdminBundle\Form\HomeEditType;
use ZD\AdminBundle\Entity\DayEdit;
use ZD\AdminBundle\Form\DayEditType;
use ZD\AdminBundle\Entity\Week;


class AdminController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('ZDAdminBundle:Admin:index.html.twig');
    }
    
    public function viewHomeAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        $home = $em->getRepository('ZDAdminBundle:Home')->findAll();

         $listHome = $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Home')
            ->findAll()
          ;

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
        return $this->render('ZDAdminBundle:Admin:viewHome.html.twig', array(
          'listHome'       => $listHome,
        ));
  
    }
    
    //**********************************************************
    //****ADD*************************************************
    //**********************************************************
    
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
        'home' => $home
      ));
    }
    
    //**********************************************************
    //****EDIT*************************************************
    //**********************************************************
    
    public function editHomeAction($id, Request $request)
    {
      // On récupère l'EntityManager
      $em = $this->getDoctrine()->getManager();

      // On récupère l'entité correspondant à l'id $id
      $home = $em->getRepository('ZDAdminBundle:Home')->find($id);

      // Si l'annonce n'existe pas, on affiche une erreur 404
      if ($home == null) {
        throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
      }
      // Ici, on s'occupera de la création et de la gestion du formulaire
        $form = $this->createForm(new HomeEditType(), $home);

        if ($form->handleRequest($request)->isValid()) {
          // Inutile de persister ici, Doctrine connait déjà notre annonce
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

          return $this->redirect($this->generateUrl('zd_admin_viewHome', array('id' => $home->getId())));
        }

      // Ici, on s'occupera de la création et de la gestion du formulaire

      return $this->render('ZDAdminBundle:Admin:editHome.html.twig', array(
        'form'   => $form->createView(),
        'home' => $home
      ));
    }
    
    
    //**********************************************************
    //****DELETE*************************************************
    //**********************************************************
    public function deleteHomeAction($id, Request $request)
    {
      // On récupère l'EntityManager
      $em = $this->getDoctrine()->getManager();

      // On récupère l'entité correspondant à l'id $id
      $home = $em->getRepository('ZDAdminBundle:Home')->find($id);

      // Si l'annonce n'existe pas, on affiche une erreur 404
      if ($home == null) {
        throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
      }
      
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
        $form = $this->createFormBuilder()->getForm();

        if ($form->handleRequest($request)->isValid()) {
          $em->remove($home);
          $em->flush();

          $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");

          return $this->redirect($this->generateUrl('zd_admin_viewHome'));
        }

      // Si la requête est en GET, on affiche une page de confirmation avant de delete
      return $this->render('ZDAdminBundle:Admin:deleteHome.html.twig', array(
         'home' => $home,
         'form'=> $form->createView()
      ));
    }

     
    public function viewDayAction($weekId)
    {

         
         $week  = $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Week')
            ->findOneBy(['weekId'=>$weekId])
          ;
        
         $listDay = $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Day')
            ->findBy(['week'=>$week])
          ;

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
        return $this->render('ZDAdminBundle:Admin:viewDay.html.twig', array(

            'listDay'       => $listDay,
            'week'          => $week,
        ));
  
    }
    
    public function addDayAction($weekId, Request $request)
    {
//        $week= new Week();
//        $form = $this->createForm(new WeekType(), $week);
 
        $week  = $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Week')
            ->findOneBy(['weekId'=>$weekId])
          ;
        
        $day = new Day();
        $day->setWeek($week);
        $form = $this->createForm(new DayType(), $day);

//        $day->setWeek($week);
        
        if ($form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
//        $em->persist($week);
        $em->persist($day);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', ' Bien ajouté.');

        return $this->redirect($this->generateUrl('zd_admin_viewDay', array('id' => $day->getId())));
      }

      // À ce stade, le formulaire n'est pas valide car :
      // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
      // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
      return $this->render('ZDAdminBundle:Admin:addDay.html.twig', array(
        'form' => $form->createView(),
        'day' => $day,
        'week'=> $week,
      ));
        
    }
    
    
    
     //**********************************************************
    //****EDIT*************************************************
    //**********************************************************
    
    public function editDayAction($id, $weekId, Request $request)
    {
      // On récupère l'EntityManager
      $em = $this->getDoctrine()->getManager();

      // On récupère l'entité correspondant à l'id $id
      $week  = $em->getRepository('ZDAdminBundle:Week')->findOneBy(['weekId'=>$weekId]);
      $day = $em->getRepository('ZDAdminBundle:Day')->find($id);

      

      // Si l'annonce n'existe pas, on affiche une erreur 404
      if ($day == null) {
        throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
      }
      // Ici, on s'occupera de la création et de la gestion du formulaire
        $form = $this->createForm(new DayEditType(), $day);

        if ($form->handleRequest($request)->isValid()) {
          // Inutile de persister ici, Doctrine connait déjà notre annonce
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

          return $this->redirect($this->generateUrl('zd_admin_viewDay', array('id' => $day->getId())));
        }

      // Ici, on s'occupera de la création et de la gestion du formulaire

      return $this->render('ZDAdminBundle:Admin:editDay.html.twig', array(
        'form'   => $form->createView(),
        'day' => $day,
        'week' => $week,
          
      ));
    }
    
    
    //**********************************************************
    //****DELETE*************************************************
    //**********************************************************
    public function deleteDayAction($id, $weekId, Request $request)
    {
      // On récupère l'EntityManager
      $em = $this->getDoctrine()->getManager();

      // On récupère l'entité correspondant à l'id $id
      $week  = $em->getRepository('ZDAdminBundle:Week')->findOneBy(['weekId'=>$weekId]);
      $day = $em->getRepository('ZDAdminBundle:Day')->find($id);
      

      // Si l'annonce n'existe pas, on affiche une erreur 404
      if ($day == null) {
        throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
      }
      
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
        $form = $this->createFormBuilder()->getForm();

        if ($form->handleRequest($request)->isValid()) {
          $em->remove($day);
          $em->flush();

          $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");

          return $this->redirect($this->generateUrl('zd_admin_viewDay'));
        }

      // Si la requête est en GET, on affiche une page de confirmation avant de delete
      return $this->render('ZDAdminBundle:Admin:deleteDay.html.twig', array(
         'week' => $week,
          'day' => $day,
         'form'=> $form->createView()
      ));
    }
    
    
        
    
     
}
