<?php

namespace TS\Bundle\GameConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfigBuildingLevelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level')
            ->add('configBuilding')
            ->add('requiredBuildings', null,  array('required' => false))
            ->add('requiredTechnologies', null,  array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel'
        ));
    }

    public function getName()
    {
        return 'TS_bundle_gameconfigbundle_configbuildingleveltype';
    }
}
