<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('user',TextType::class,array('label'=>'Username','required'=>'required'))
            ->add('password',PasswordType::class,array('label'=>'Password'))
            ->add('mail',EmailType::class,array('label'=>'Correo Electrónico','required'=>true))
            ->add('code',TextType::class,array('label'=>'Code','required'=>false))
            ->add('level','Symfony\Bridge\Doctrine\Form\Type\EntityType',array(
                'class' => 'CoreBundle\Entity\Level',
                'label' => 'Level',
            ))
            ->add('active')
            ->add('crear', SubmitType::class,  array(
                    'label' => 'Crear')
            )
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Usuarios'
        ));
    }

    public function getBlockPrefix()
    {
        return 'corebundle_usuarios';
    }
}
