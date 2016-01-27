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
         
         $articlesWeek= $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Week')
            ->findAll()
          ;
          return $this->render('ZDBlogBundle:Article:index.html.twig', array (
              "articles"    =>$articles,
              "articlesWeek"    =>$articlesWeek,
             
          ));

    }
    
    
    
    public function viewAction($weekId)
    {
        
         $week  = $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Week')
            ->findOneBy(['weekId'=>$weekId])
          ;
        
         $listDays = $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Day')
            ->findBy(['week'=>$week])
          ;
         
         $image = $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:Image')
            ->findAll()
          ;
         
//         $listWeeks = $this->getDoctrine()
//                  ->getManager()
//                  ->getRepository('ZDAdminBundle:Week')
//                  ->findAll()
//          ;

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
        return $this->render('ZDBlogBundle:Article:view.html.twig', array(

            'listDays'       => $listDays,
            'week'          => $week,
            'image'        =>$image,
//            'listWeeks'     =>$listWeeks,
        ));
    }
    

     public function viewUserPageAction()
     {
          
         $articles= $this->getDoctrine()
            ->getManager()
            ->getRepository('ZDAdminBundle:UserPage')
            ->findAll()
          ;
         
          return $this->render('ZDBlogBundle:Article:userPage.html.twig', array (
              "articles"    =>$articles,

             
          ));
     }
     
}
  