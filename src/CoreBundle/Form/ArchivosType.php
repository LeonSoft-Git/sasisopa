<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArchivosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder->add('nombre',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
              ->add('cartaPoder',FileType::class,array('required'=>false,'data_class'=>null,'attr'=>array('ruta'=>'images'),'label'=>'Archivo'))
              ->add('enviar', SubmitType::class, array('label'=> 'Enviar'))
    ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array('data_class'=>'CoreBundle\Entity\Archivos'));
    }

    public function getBlockPrefix()
    {
        return 'coreBundle_archivos';
    }
}
