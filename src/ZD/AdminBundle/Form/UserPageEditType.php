<?php

namespace ZD\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserPageEditType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ZD\AdminBundle\Entity\UserPageEdit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zd_adminbundle_userpageedit';
    }
}
