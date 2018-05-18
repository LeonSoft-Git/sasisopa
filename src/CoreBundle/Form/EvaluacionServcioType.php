<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluacionServcioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('departamento',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fecha', DateType::class, array(
                            'widget' => 'single_text',
                            'format' => 'yyyy-MM-dd',
                        ))
                ->add('servicio_evaluado',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('proveedor',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('entrega_servicio', ChoiceType::class, array(
                            'choices'  => array(
                                '- -' => null,
                                'Si' => '1',
                                'No' => '2',
                            ),
                        ))
                ->add('entregas_tiempo', ChoiceType::class, array(
                            'choices'  => array(
                                '- -' => null,
                                'Mejor' => '1',
                                'Igual' => '2',
                                'Peor' => '3',
                                'No hay referencia' => '4',
                            ),
                        ))
                ->add('precio_servicio', ChoiceType::class, array(
                            'choices'  => array(
                                '- -' => null,
                                'Caro' => '1',
                                'Equivalente' => '2',
                                'Barato' => '3',
                            ),
                        ))
                ->add('precio_comparado', ChoiceType::class, array(
                            'choices'  => array(
                                '- -' => null,
                                'Más caro' => '1',
                                'Equivalente' => '2',
                                'Más barato' => '3',
                                'No hay referencia' => '4',
                            ),
                        ))
                ->add('satisfaccion_servicio', ChoiceType::class, array(
                            'choices'  => array(
                                '- -' => null,
                                'Excelente' => '1',
                                'Bueno' => '2',
                                'Regular' => '3',
                                'Deficiente' => '4',
                                'Malo' => '5',
                            ),
                        ))
                ->add('satisfaccion_comparado', ChoiceType::class, array(
                            'choices'  => array(
                                '- -' => null,
                                'Excelente' => '1',
                                'Bueno' => '2',
                                'Regular' => '3',
                                'Deficiente' => '4',
                                'Malo' => '5',
                                'No hay referencia' => '6',
                            ),
                        ))
                ->add('satisfaccion_proveedor', ChoiceType::class, array(
                            'choices'  => array(
                                '- -' => null,
                                'Incluirse como un proveedor aprobado' => '1',
                                'No incluirse como un proveedor aprobado' => '2',
                            ),
                        ))

                ->add('ingresar',SubmitType::class,array('label'=> 'Insertar'))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\EvaluacionServicio'
        ));
    }

    public function getBlockPrefix()
    {
        return 'core_bundle_evaluacion_servcio_type';
    }
}
