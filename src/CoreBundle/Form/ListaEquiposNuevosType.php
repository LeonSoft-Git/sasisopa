<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListaEquiposNuevosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre_estacion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('equipo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('serial',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('marca',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('fabricante',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('critico',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('no_estacion',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('fecha_llenado', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ))
            ->add('no_id',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('modelo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('nombre_estacion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('fecha_compra', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ))
            ->add('ano_fabricacion', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy',
            ))
            ->add('ubicacion_final',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\ListaEquiposNuevos'
        ));
    }


    public function getBlockPrefix()
    {
        return 'core_bundle_lista_equipos_nuevos_type';
    }
}
