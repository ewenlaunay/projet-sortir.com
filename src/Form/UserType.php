<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                "label" => "Pseudo: ",
                "mapped" => false,
                "attr" => array(
                    "class" => "form-control form-control-sm"
                )
            ])
            ->add('firstName', TextType::class, [
                "label" => "Prénom: ",
                "attr" => array(
                    "class" => "form-control form-control-sm"
                )
            ])
            ->add('name', TextType::class, [
                "label" => "Nom: ",
                "attr" => array(
                    "class" => "form-control form-control-sm"
                )
            ])
            ->add('phoneNumber', TextType::class, [
                "label" => "Téléphone: ",
                "attr" => array(
                    "class" => "form-control form-control-sm"
                )
            ])
            ->add('email', EmailType::class, [
                "label" => "Email: ",
                "attr" => array(
                    "class" => "form-control form-control-sm"
                )
            ])
            ->add('password', PasswordType::class, [
                "label" => "Mot de passe: ",
                "attr" => array(
                    "class" => "form-control form-control-sm"
                )
            ])
            ->add('confirmation', PasswordType::class, [
                "label" => "Confirmation: ",
                "mapped" => false,
                "attr" => array(
                    "class" => "form-control form-control-sm"
                )
            ])
            ->add('registratedFor', ChoiceType::class, [
                "label" => "Ville de rattachement: ",
                "attr" => array(
                    "class" => "form-select form-select-sm mb-3"
                )
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
