<?php

namespace CoreBundle\Form;

use Mapping\Fixture\Yaml\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReporteAspAmbType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('titulo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fecha', DateType::class, array(
                            'widget' => 'single_text',
                            'format' => 'yyyy-MM-dd',
                ))
                ->add('hora', TimeType::class, array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ))
                ->add('turno', ChoiceType::class, array(
                            'choices' => array(
                            'matutino' => 'matutino',
                            'vespertino' => 'vespertino',
                            'nocturno' => 'nocturno',
                    )))
                ->add('observacion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('colaborador', CheckboxType::class, array(
                    'label'    => 'Colaborador',
                    'required' => false,
                ))
                ->add('contratista', CheckboxType::class, array(
                    'label'    => 'Contratista',
                    'required' => false,
                ))
                ->add('visitante', CheckboxType::class, array(
                    'label'    => 'Visitante',
                    'required' => false,
                ))
                ->add('planeada', CheckboxType::class, array(
                    'label'    => 'Planeada',
                    'required' => false,
                ))
                ->add('espontanea', CheckboxType::class, array(
                    'label'    => 'Espontanea',
                    'required' => false,
                ))
                ->add('ingresar', SubmitType::class,  array(
                            'label' => 'Ingresar'))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Reporte1'
        ));
    }

    public function getBlockPrefix()
    {
        return 'corebundle_reporte';
    }
}
