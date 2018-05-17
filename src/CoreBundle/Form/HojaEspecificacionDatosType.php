<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HojaEspecificacionDatosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('equipo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('serial',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('marca',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fabricante',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('critico',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('no_id',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('modelo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fecha', DateType::class, array(
                            'widget' => 'single_text',
                            'format' => 'yyyy-MM-dd',
                        ))
                ->add('ano_fabricacion', DateType::class, array(
                            'widget' => 'choice',
                            'format' => 'yyyy-MM-dd'
                ))
                ->add('ubicacion_fisica',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('capacidad',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('dimensiones', ChoiceType::class, array(
                        'choices'  => array(
                        '- -' => null,
                        'X(largo)' => '1',
                        'Y(ancho)' => '2',
                        'Z(alto)' => '3',
                    ),

                ))
                ->add('peso_total',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('caudal' , TextType::class, array('required' => true))
                ->add('temperatura' , NumberType::class, array('required' => true))
                ->add('voltaje' , NumberType::class, array('required' => true))
                ->add('presion' , NumberType::class, array('required' => true))
                ->add('funcion' , TextareaType::class, array('required' => true))
                ->add('especificaciones_fab' , TextareaType::class, array('required' => true))
                ->add('observaciones' , TextareaType::class, array('required' => false))
                ->add('insertar', SubmitType::class, array('label'=> 'Insertar'))

            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //data_class manda llamar las tablas del entity de la listas
        $resolver->setDefaults(array('data_class' => 'CoreBundle\Entity\HojaEspecificacion'));
    }

    public function getBlockPrefix()
    {
        return 'core_bundle_hoja_especificacion_datos_type';
    }
}
