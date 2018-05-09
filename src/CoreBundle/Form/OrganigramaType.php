<?php

namespace CoreBundle\Form;
//Todos los use que se usan en este formulario para poder realizar el formulario
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganigramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   //Crea los forms para ingresar los nombres atravez de un input hacia el organigrama
        $builder->add('altadireccion',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('representantetecnico',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('jefemantenimiento',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('jefedeturno',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('despachadores',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('auxiliaradmin',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('prestadores',TextType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
                ->add('ingresar', SubmitType::class,  array(
                'label' => 'Ingresar'))
         ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //data_class manda llamar las tablas del entity del organigrama
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\organigrama'
        ));
    }

    public function getBlockPrefix()
    {
        return 'corebundle_organigrama';
    }
}
