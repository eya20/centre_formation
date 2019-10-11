<?php

namespace GestionBundle\Form;

use AppBundle\Entity\Evaluations;
use AppBundle\Entity\Formation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;



class EvaluationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEvaluation', TextType::class, [
                'label' => "Nom d'évaluation",
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => "Nom d'évaluation"
                )
            ])
            ->add('dateEvaluation', DateTimeType::class, [
                'label' => 'Date Evaluation',
                'widget' => 'single_text',
                'input'  => 'string',
                'attr' => array(
                    'class' => 'form-control',
                )
            ])
            ->add('formations', EntityType::class, [
                'label' => "Formtion",
                'class' => Formation::class,
                'choice_label' => 'nom',
                'attr' => array(
                    'class' => 'form-control',
                )
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evaluations::class,
            'method' => "POST"
        ]);
    }
}
