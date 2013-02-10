<?php

namespace TentacleSoft\Bundle\GameConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfigUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /**
         * @TODO all the costs are being declarated explicitly in each, this doesn't sound very DRY to me, see if there's some way to avoid that
         */
        $builder
            ->add('name')
            ->add('description')
            ->add('baseAttack')
            ->add('baseDefense')
            ->add('baseHealth')
            ->add('productionTime')
            ->add('goldCost', 'integer')
            ->add('energyCost', 'integer')
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
