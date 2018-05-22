<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecursosNecesariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cantidad',NumberType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('descripcion', TextareaType::class,array('required'=>true, 'attr'=>array('autocomplete'=>'off')))
                ->add('insertar', SubmitType::class, array('label'=> 'Insertar'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\RecursosNecesarios'
        ));
    }

    public function getBlockPrefix()
    {
        return 'core_bundle_recursos_necesarios_type';
    }
}
