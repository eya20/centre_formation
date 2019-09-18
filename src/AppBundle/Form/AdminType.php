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
use GestionBundle\Entity\Admin;


class AdminType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('UserName',TextType::class)
        ->add('Email', EmailType::class)
        ->add('Password', RepeatedType::class, [
             'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'first_options'  => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat Password'],
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