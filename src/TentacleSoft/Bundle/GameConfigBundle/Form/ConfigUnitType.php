<?php

namespace TentacleSoft\Bundle\GameConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfigUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('baseAttack')
            ->add('baseDefense')
            ->add('baseHealth')
            ->add('productionTime')
            ->add('costs', 'collection', array('type' => 'string'))
            ->add('building', null, array('required' => false))
            ->add('requiredTechnologies', null, array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigUnit'
        ));
    }

    public function getName()
    {
        return 'tentaclesoft_bundle_gameconfigbundle_configunittype';
    }
}
