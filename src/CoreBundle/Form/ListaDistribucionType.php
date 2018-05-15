<?php

namespace CoreBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListaDistribucionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('clave',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('nombre_documento',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('no_revision',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('no_copia',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fecha_ultima', DateType::class, array(
                            'widget' => 'single_text',
                            'format' => 'yyyy-MM-dd',
                        ))
                ->add('procesos_areas',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('ingresar', SubmitType::class,  array('label' => 'Ingresar'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //data_class manda llamar las tablas del entity de la listas
        $resolver->setDefaults(array('data_class' => 'CoreBundle\Entity\ListaDistribucion'));
    }

    public function getBlockPrefix()
    {
        return 'corebundle_listadistribucion';
    }
}
