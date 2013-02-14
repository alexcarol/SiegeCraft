<?php

namespace TS\Bundle\GameConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfigTechnologyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('multiplier')
            ->add('goldCost', 'integer')
            ->add('energyCost', 'integer')
            ->add('requiredTechnologies', null,  array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TS\Bundle\GameConfigBundle\Entity\ConfigTechnology'
        ));
    }

    public function getName()
    {
        return 'TS_bundle_gameconfigbundle_configtechnologytype';
    }
}
