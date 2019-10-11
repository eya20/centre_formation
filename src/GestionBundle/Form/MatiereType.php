<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Matiere;


class MatiereType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de Matière',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => "Nom de Matière"
                )

            ])->add('duree', TextType::class, [
                'label' => 'Durée',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => "Durée"
                )

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matiere::class,
            'method' => "POST"
        ]);
    }
}
