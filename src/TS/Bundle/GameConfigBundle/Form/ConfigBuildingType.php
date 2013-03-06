<?php

namespace TS\Bundle\GameConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfigBuildingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('multiplier')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TS\Bundle\GameConfigBundle\Entity\ConfigBuilding'
        ));
    }

    public function getName()
    {
        return 'TS_bundle_gameconfigbundle_configbuildingtype';
    }
}
