<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequirementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('dependencia',TextType::class,array('label'=>'Dependencia'))
            ->add('clasificacion',TextType::class,array('label'=>'Clasificación'))
            ->add('codificacion',TextType::class,array('label'=>'Codificación'))
            ->add('titulo',TextType::class,array('label'=>'Título'))
            ->add('ano_emision',TextType::class,array('label'=>'Año de emisión'))
            ->add('patron',TextType::class,array('label'=>'Patrón'))
            ->add('trabajadores',TextType::class,array('label'=>'Trabajadores'))
            ->add('generales',TextType::class,array('label'=>'Generales'))
            ->add('disposiciones_especificas',TextType::class,array('label'=>'Disposiciones especificas'))
            ->add('articulos_aplicables',TextType::class,array('label'=>'Artículos aplicables'))
            ->add('descripcion_requisito',TextType::class,array('label'=>'Descripción requisito'))
            ->add('link',TextType::class,array('label'=>'link'))
            ->add('crear', SubmitType::class,  array(
                    'label' => 'Crear')
            )
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\LegalRequirements'
        ));
    }

    public function getBlockPrefix()
    {
        return 'corebundle_LegalRequirements';
    }




}
