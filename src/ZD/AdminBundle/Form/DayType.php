<?php

namespace ZD\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
                'label'             => 'Contenu',
                'config_name'       => 'Ivory_config'
            ))
            ->add('images', 'collection', array(
                'type'         => new ImageType(),
                'allow_add'    => true,
                'allow_delete' => true,
    
            ))


            ->add('save',      'submit')
        ;
        
//        
//                // On ajoute une fonction qui va écouter un évènement
//                $builder->addEventListener(
//                  FormEvents::PRE_SET_DATA,    // 1er argument : L'évènement qui nous intéresse : ici, PRE_SET_DATA
//                  function(FormEvent $event) { // 2e argument : La fonction à exécuter lorsque l'évènement est déclenché
//                    // On récupère notre objet Advert sous-jacent
//                    $day = $event->getData();
//
//                    // Cette condition est importante, on en reparle plus loin
//                    if (null === $day) {
//                      return; // On sort de la fonction sans rien faire lorsque $advert vaut null
//                    }
//
//                    if (null === $day->getId()) {
//                  $event->getForm()->add('published', 'checkbox', array('required' => false));
//                } else {
//                  $event->getForm()->remove('published');
//                }
//              }
//            );
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
