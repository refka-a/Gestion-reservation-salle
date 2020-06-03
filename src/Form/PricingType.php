<?php

namespace App\Form;

use App\Entity\Pricing;
use App\Entity\Salle;
use App\Entity\Beneficiary;
use App\Entity\Timing;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PricingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idSalle', EntityType::class, array('class' => 'App\Entity\Salle', 'choice_label' => 'Salle'))
            ->add('idBeneficiary', EntityType::class, array('class' => 'App\Entity\Beneficiary', 'choice_label' => 'Beneficiary'))
            ->add('idTiming', EntityType::class, array('class' => 'App\Entity\Timing', 'choice_label' => 'Timing'))
            ->add('price');
            

    
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pricing::class,
        ]);
    }
}
