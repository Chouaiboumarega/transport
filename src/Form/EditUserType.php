<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class,[
            'constraints' => [
                new NotBlank([
                 'message' => 'Merci d\'entrer un email',
                ]),
            ],
            'required' => true,
            'attr' => ['class' =>'form-control'],
        ])
        ->add('prenom',$type = null, $options = [
            'label' => 'Prenom',
            ])
        ->add('fonction',$type = null, $options = [
            'label' => 'Fonction',
            ])
        ->add('societe',$type = null, $options = [
            'label' => 'Raison sociale',
            ])
        ->add('siret',$type = null, $options = [
            'label' => 'Siret',
            ])
        ->add('roles', ChoiceType::class,[
            'choices' => [
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN',
            ],
            'expanded' => true,
            'multiple' => true,
            'label' => 'Roles'
        ])
        ->add('valider', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
