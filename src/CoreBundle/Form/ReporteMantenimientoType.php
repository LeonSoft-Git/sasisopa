<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReporteMantenimientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('direccion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('noEstacion',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fechaRealizacion', DateType::class, array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
                ->add('horarioInicio', TimeType::class, array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ))
                ->add('horarioTermino', TimeType::class, array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ))
                ->add('mantenimientoInt', CheckboxType::class, array(
                            'label'    => 'Interno',
                            'required' => false,))
                ->add('mantenimientoExt', CheckboxType::class, array(
                            'label'    => 'Externo',
                            'required' => false,))
                ->add('tipoPrev', CheckboxType::class, array(
                            'label'    => 'Preventivo',
                            'required' => false,))
                ->add('tipoCorrectivo', CheckboxType::class, array(
                            'label'    => 'Correctivo',
                            'required' => false,))
                ->add('area',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('nombreEquipo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('trabajoSolicitado',TextareaType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('objetivo',TextareaType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('alcance',TextareaType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('trabajoRealizado',TextareaType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('trabajoSolicitado',TextareaType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('ingresar', SubmitType::class, array('label'=> 'Insertar'))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\ReporteMantenimiento'
        ));
    }

    public function getBlockPrefix()
    {
        return 'core_bundle_reporte_mantenimiento_type';
    }
}
