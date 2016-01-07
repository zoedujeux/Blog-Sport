<?php

namespace ZD\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DayType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleH2',    'text')
            ->add('content','ckeditor', array(
                'label' => 'Contenu',
            ))
            ->add('images', 'collection', array(
                'type'         => new ImageType(),
                'allow_add'    => true,
                'allow_delete' => true
            ))


            ->add('save',      'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ZD\AdminBundle\Entity\Day'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zd_adminbundle_day';
    }
}
