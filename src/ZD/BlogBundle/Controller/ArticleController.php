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
//          $content = $this->get('templating')->render('ZDBlogBundle:Article:index.html.twig');
//            
//          return new Response($content);
         $index = array (
             'titleH1' => "Blog Sportif",
             'titleH2' => "Salut les filles !",
             'content' => "Blabla pour le moment"
         );
          return $this->render('ZDBlogBundle:Article:index.html.twig', array(
            'index' => $index
            ));
          
//          return $this->render( controller('ZDAdminBundle:Admin:viewHome'));
    }
    
    public function viewAction( Request $request)
    {
         $article = array (
             'titleH2' => "Titre de l'article",
             'titleH3' => "Sous-titre de l'article",
             'image' => "Image",
             'content'=> "texte général",
         );
                 
            return $this->render('ZDBlogBundle:Article:view.html.twig', array(
            'article' => $article
          ));
    }
    
    public function registerAction (Request $request)
    {
  
        $register = new FormRegister();

        
        $form = $this->get('form.factory')->createBuilder('form', $register)

          ->add('name',      'text')
          ->add('email',     'email')
          ->add('password',   'password')
          ->add('save',      'submit')
          ->getForm()
        ;

        $form = handleRequest($request);
        
        if ($form->isValid()) {
       
        $em = $this->getDoctrine()->getManager();
        $em->persist($register);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Vous avez bien été enregistré.');

       
        return $this->redirect($this->generateUrl('zd_blog_register', array('id' => $register->getId())));
      }

      
     
      return $this->render('ZDBlogBundle:Article:register.html.twig', array(
        'form' => $form->createView(),
      ));

    
    }
    
     public function loginAction (Request $request)
    {

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