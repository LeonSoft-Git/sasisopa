<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RevisionExtintoresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('ubicacion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('ubicacionLugar',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                        )))
                ->add('sello',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                    )))
                ->add('nemotecnia',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                    )))
                ->add('ultimaCarga',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                    )))
                ->add('obstaculos',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                    )))
                ->add('ruedas',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                    )))
                ->add('senalamientos',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                    )))
                ->add('danos',ChoiceType::class,
                    array('choices' => array(
                        ' ' => null,
                        'si' => '1',
                        'no' => '2',
                    )))
                ->add('ingresar', SubmitType::class,  array('label' => 'Ingresar'))
        ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //data_class manda llamar las tablas del entity de la listas
        $resolver->setDefaults(array('data_class' => 'CoreBundle\Entity\RevisionExtintores'));
    }

    public function getBlockPrefix()
    {
        return 'core_bundle_revision_extintores_type';
    }
}
