<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RevisionesExternasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fecha', DateType::class, array(
                            'widget' => 'single_text',
                            'format' => 'yyyy-MM-dd',
                        ))
                ->add('insertar', ButtonType::class, array('label'=> 'Actualizar'))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //data_class manda llamar las tablas del entity revisionesExternas
        $resolver->setDefaults(array('data_class' => 'CoreBundle\Entity\RevisionesExternas'));
    }

    public function getBlockPrefix()
    {
        return 'core_bundle_revisiones_externas_type';
    }
}
