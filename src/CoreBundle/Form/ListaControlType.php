<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListaControlType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('clave',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('no_revision',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fecha_ultima', DateType::class, array(
                            'widget' => 'single_text',
                            'format' => 'yyyy-MM-dd',
                        ))
                ->add('nombre_registro',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('responsable',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('ubicacion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('tiempo',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('archivo_tiempo',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('destruccion', CheckboxType::class, array(
                            'label'    => 'Destrucción',
                            'required' => false,))
                ->add('papel', CheckboxType::class, array(
                            'label'    => 'Papel',
                            'required' => false,))
                ->add('electronico', CheckboxType::class, array(
                            'label'    => 'Electronico',
                            'required' => false,))
                ->add('observaciones',TextareaType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('ingresar', SubmitType::class,  array(
                            'label' => 'Ingresar'))

                ->add('ingresar', SubmitType::class,  array('label' => 'Ingresar'))
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\ListaControl'
        ));
    }

    public function getBlockPrefix()
    {
        return 'core_bundle_lista_control_type';
    }
}
