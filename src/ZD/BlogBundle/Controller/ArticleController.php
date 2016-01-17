<?php

namespace ZD\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ZD\BlogBundle\Entity\FormRegister;


class ArticleController extends Controller
{
     public function indexAction()
    {
         
         $articles= $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Home')
            ->findAll()
          ;
          return $this->render('ZDBlogBundle:Article:index.html.twig', array (
              "articles"    =>$articles,
             
          ));

         
          

    }
    
    public function viewAction()
    {
         $articles= $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Day')
            ->findAll()
          ;
          return $this->render('ZDBlogBundle:Article:view.html.twig', array (
              "articles"    =>$articles,
             
          ));
    }
    
    
    
   
    
     public function addAction(Request $request)
    {
//            $advert = new Advert();
//            $form = $this->createForm(new AdvertType(), $advert);
//
//            if ($form->handleRequest($request)->isValid()) {    
//              $em = $this->getDoctrine()->getManager();
//              $em->persist($advert);
//              $em->flush();
//
//              $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
//
//              return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
//            }
//
//            return $this->render('OCPlatformBundle:Advert:add.html.twig', array(
//              'form' => $form->createView(),
//              'advert' => $advert
//            ));

    }
    
    
    //**********************************************************
    //****EDIT*************************************************
    //**********************************************************
    
    public function editAction($id, Request $request)
    {

    }
    
    
    //**********************************************************
    //****DELETE*************************************************
    //**********************************************************
    public function deleteAction($id, Request $request)
    {
      
    }
    
    //**********************************************************
    //***MENU*************************************************
    //**********************************************************
    
//    public function menuAction($limit = 3)
//    {
//      $listAdverts = $this->getDoctrine()
//        ->getManager()
//        ->getRepository('OCPlatformBundle:Advert')
//        ->findBy(
//          array(),                 // Pas de critère
//          array('date' => 'desc'), // On trie par date décroissante
//          $limit,                  // On sélectionne $limit annonces
//          0                        // À partir du premier
//      );
//
//      return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
//        'listAdverts' => $listAdverts
//      ));
//    }
//    
    
}