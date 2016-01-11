<?php

namespace ZD\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class DayEditType extends AbstractType
{

    public function getParent()
    {
      return new DayType();
    }

    public function getName()
    {
        return 'zd_adminbundle_dayedit';
    }
}
