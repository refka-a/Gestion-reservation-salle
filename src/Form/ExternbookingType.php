<?php

namespace App\Form;

use App\Entity\Externbooking;
use App\Entity\Salle;
use App\Entity\Timing;
use App\Entity\Hours;
use App\Entity\Beneficiary;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ExternbookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisonSocial')
            ->add('objet')
            ->add('description')
            ->add('email')
            ->add('numeroTel')
            ->add('datedebut')
            ->add('datefin')
            ->add('idSalle', EntityType::class, array('class' => 'App\Entity\Salle', 'choice_label' => 'Salle'))
            ->add('idBeneficiary', EntityType::class, array('class' => 'App\Entity\Beneficiary', 'choice_label' => 'Beneficiary'))
            ->add('idTiming', EntityType::class, array('class' => 'App\Entity\Timing', 'choice_label' => 'Timing'))
            ->add('idHours', EntityType::class, array('class' => 'App\Entity\Hours', 'choice_label' => 'Hours'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Externbooking::class,
        ]);
    }
}
