<?php

namespace ZD\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
     public function indexAction()
    {
//          $content = $this->get('templating')->render('ZDBlogBundle:Article:index.html.twig');
//            
//          return new Response($content);
         
          return $this->render('ZDBlogBundle:Article:index.html.twig');
    }
    
    public function viewAction($id, Request $request)
    {
         $article = array (
             'title' => "Titre de l'article",
             'image' => "Image",
             'content'=> "texte général",
         );
                 
            return $this->render('ZDBlogBundle:Article:view.html.twig', array(
            'id' => $id,
            'article' => $article
          ));
    }
    
    
}