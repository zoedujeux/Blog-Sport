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
         $index = array (
             'titleH1' => "Blog Sportif",
             'titleH2' => "Salut les filles !",
             'content' => "Blabla pour le moment"
         );
          return $this->render('ZDBlogBundle:Article:index.html.twig', array(
            'index' => $index
            ));
    }
    
    public function viewAction($id, Request $request)
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
    
    
}