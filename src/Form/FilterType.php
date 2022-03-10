<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('site', ChoiceType::class, [
                "label" => "Site: ",
                "required" => false,
                "mapped" => false,
                "attr" => array(
                    "class" => "form-select form-select-sm mb-3"
                )
            ])
            ->add('contain', TextType::class, [
                "label" => "Le nom de la sortie contient:  ",
                "required" => false,
                "mapped" => false,
                "attr" => array(
                    "class" => "form-control form-control-sm pure-input-rounded"
                )
            ])
            ->add('date_debut', DateType::class, [
                "label" => "Entre ",
                'widget' => 'single_text',
                "required" => false,
                "mapped" => false,
                'html5' => false,
                "attr" => array(
                    "class" => "js-datepicker",
                )
            ])
            ->add('date_fin', DateType::class, [
                "label" => "et ",
                'widget' => 'single_text',
                "required" => false,
                "mapped" => false,
                'html5' => false,
                "attr" => array(
                    "class" => "js-datepicker"
                )
            ])
            ->add('organize', CheckboxType::class, [
                "label" => "Sorties dont je suis organisateur/trice",
                "required" => false,
                "mapped" => false,
                "attr" => array(
                    "class" => "form-check-input"
                )
            ])
            ->add('booked', CheckboxType::class, [
                "label" => "Sorties auxquelles je suis inscrit/te",
                "required" => false,
                "mapped" => false,
                "attr" => array(
                    "class" => "form-check-input"
                )
            ])
            ->add('not_booked', CheckboxType::class, [
                "label" => "Sorties auxquelles je ne suis pas inscrit/te",
                "required" => false,
                "mapped" => false,
                "attr" => array(
                    "class" => "form-check-input"
                )
            ])
            ->add('passed', CheckboxType::class, [
                "label" => "Sorties passées",
                "required" => false,
                "mapped" => false,
                "attr" => array(
                    "class" => "form-check-input"
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
