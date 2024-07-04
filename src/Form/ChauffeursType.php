<?php

namespace App\Form;

use App\Entity\Chauffeurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChauffeursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom',$type = null, $options = [
            'label' => 'Nom',
            ])
        ->add('prenom',$type = null, $options = [
            'label' => 'Prenom',
            ])
        ->add('permis',$type = null, $options = [
            'label' => 'N° permis',
            ])
        ->add('date',$type = null, $options = [
            'label' => 'Date de naissance',
            ])
        ->add('embauche',$type = null, $options = [
            'label' => 'Date embauche',
            ])
        ->add('contrat',$type = null, $options = [
            'label' => 'Type contrat',
            ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chauffeurs::class,
        ]);
    }
}
