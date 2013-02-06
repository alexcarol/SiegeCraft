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
            ->add('costs')
            ->add('isRequiredByBuildings')
            ->add('requiredBuildings')
            ->add('requiredTechnologies')
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
