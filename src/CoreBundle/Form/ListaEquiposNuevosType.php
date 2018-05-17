<?php

namespace CoreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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

class ListaEquiposNuevosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre_estacion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('equipo',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('serial',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('marca',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('fabricante',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('critico',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('no_estacion',IntegerType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off','step'=>'1',
                'min'=>'0',
                'max'=>'10')))
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
                        'widget' => 'choice',
                        'format' => 'yyyy-MM-dd'
                    ))
            ->add('ubicacion_final',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('planos_construidos' , TextType::class, array('required' => true))
            ->add('planos_construidos', ChoiceType::class, array(
                'choices'  => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('manuales_especificacion', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('requerimientos', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('planos', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('datos_tecnicos', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('informes', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('datos_necesarios', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('informes_ensayos', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('resultados', ChoiceType::class, array(
                'choices' => array(
                    '- -' => null,
                    'C' => 'C',
                    'NC' => 'NC',
                    ),
                ))
            ->add('observacion', TextareaType::class, array('attr'=>array('autocomplete'=>'off')))
            ->add('ingresar',SubmitType::class,array('label'=> 'Insertar'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\ListaEquiposNuevos',

        ));
    }


    public function getBlockPrefix()
    {
        return 'core_bundle_lista_equipos_nuevos_type';
    }
}
