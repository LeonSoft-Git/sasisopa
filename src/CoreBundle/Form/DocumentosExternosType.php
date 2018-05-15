<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentosExternosType extends AbstractType
{
    //Creo el formulario de Documentos Externos
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre_documento',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('fecha_ultima', DateType::class, array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
                ->add('ingresar', SubmitType::class,  array('label' => 'Ingresar'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //data_class manda llamar las tablas del entity de la listas
        $resolver->setDefaults(array('data_class' => 'CoreBundle\Entity\DocumentosExternos'));

    }

    public function getBlockPrefix()
    {
        return 'corebundle_documentosexternostype';
    }
}
