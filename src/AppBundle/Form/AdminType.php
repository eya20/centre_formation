<?php
namespace AppBundle\Form ;

use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Admin;


class AdminType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('UserName',TextType::class, [
            'label' => " Nom de l'utilisateur "
        ])
        ->add('Email', EmailType::class, [
            'label' => 'Email'
        ])
        ->add('Password', RepeatedType::class, [
             'type' => PasswordType::class,
            'invalid_message' => 'Votre mot de passe ne correspond pas.',
            'first_options'  => ['label' => 'Mot de passe'],
            'second_options' => ['label' => 'Confirmer mot de passe'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
            'method' => "POST"
        ]);
    }

}