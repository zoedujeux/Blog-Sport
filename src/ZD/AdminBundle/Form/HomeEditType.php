<?php

namespace ZD\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class HomeEditType extends AbstractType
{

    public function getParent()
    {
      return new HomeType();
    }
    
    public function getName()
    {
        return 'zd_adminbundle_homeedit';
    }
}
