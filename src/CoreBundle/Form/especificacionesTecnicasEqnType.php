<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class especificacionesTecnicasEqnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('planos_construidos', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('manuales_especificacion', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('requerimientos', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('planos', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('datos_tecnicos', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('informes', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('datos_necesarios', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('informes_ensayos', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
                ->add('resultados', ChoiceType::class, array(
                            'choices' => array(
                            'C' => 'C',
                            'NC' => 'NC',
                        )))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'core_bundleespecificaciones_tecnicas_eqn_type';
    }
}
