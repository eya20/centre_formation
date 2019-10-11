<?php

namespace GestionBundle\Form;

use AppBundle\Entity\Formateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Formation;
use AppBundle\Entity\Etudiant;
use AppBundle\Entity\Evaluations;
use AppBundle\Entity\Matiere;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class FormationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [

                'required'   => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => "Nom de formation"

                )

            ])

            ->add('dateDebut', DateType::class, [
                'label' => 'Date Début',
                'widget' => 'single_text',
                'input' => 'string',
                'required'   => true,
                'attr' => array(
                    'class' => 'form-control ',


                )
            ])

            ->add('dateFin', DateType::class, [
                'label' => 'Date Fin',
                'widget' => 'single_text',
                'input' => 'string',
                'required'   => true,
                'attr' => array(

                    'class' => 'form-control ',
                )

            ])
            ->add('salle', TextType::class, [
                'label' => 'Salle',
                'required'   => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => "Salle"
                )

            ])
            ->add('formateur', EntityType::class, [
                'label' => 'Formateurs',
                'required' => false,
                'class' => Formateur::class,
                'choice_label' => function ($formateur) {
                    return $formateur->getNom();
                },
                'multiple' => true,
                'attr' => array(
                    'class' => 'form-control js-example-basic-multiple'
                )


            ])
            ->add('etudiant', EntityType::class, [
                'label' => 'Etudiants',
                'class' => Etudiant::class,
                'required' => false,
                'choice_label' => 'nom',
                'multiple' => true,
                'attr' => array(
                    'class' => 'form-control js-example-basic-multiple'
                )


            ])
            ->add('matiere', EntityType::class, [
                'label' => 'Matière',
                'class' => Matiere::class,
                'required' => false,
                'choice_label' => 'nom',
                'multiple' => true,
                'attr' => array(
                    'class' => 'form-control js-example-basic-multiple'
                )


            ])
            /*->add('evaluation', EntityType::class, [
                'label' => 'Matière',
                'class' => Evaluations::class,
                'choice_label' => 'nomEvaluation',
                'multiple' => true,
                'attr' => array(
                    'class' => 'form-control js-example-basic-multiple'
                )


            ])*/;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
            'method' => "POST"
        ]);
    }
}
