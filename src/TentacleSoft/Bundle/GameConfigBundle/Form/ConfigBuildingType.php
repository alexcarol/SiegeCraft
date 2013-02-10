<?php

namespace TentacleSoft\Bundle\GameConfigBundle\Form;

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
            ->add('goldCost', 'integer')
            ->add('energyCost', 'integer')
            ->add('requiredBuildings', null,  array('required' => false))
            ->add('requiredTechnologies', null,  array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding'
        ));
    }

    public function getName()
    {
        return 'tentaclesoft_bundle_gameconfigbundle_configbuildingtype';
    }
}
