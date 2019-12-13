<?php


namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;




use Symfony\Component\Form\FormBuilderInterface;

class NewUserType extends AbstractType
{

        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('firstName', TextType::class, [
                    'label'    => "Prénom",
                ])
                ->add('lastName', TextType::class, [
                    'label'    => "Nom",
                ])
                ->add('email', EmailType::class, [
                    'label'    => "Email",
                ])
                ->add('password', PasswordType::class, [
                    'label'    => "Mot de passe",
                ])
                ->add('adress', TextType::class, [
                    'label'    => "Adresse",
                ])
                ->add('postCode', NumberType::class, [
                    'label'    => "Code postal",
                ])
                ->add('country', TextType::class, [
                    'label'    => "Pays",
                ])
                ->add('city', TextType::class, [
                    'label'    => "Ville",
                ])
                ->add('agree', CheckboxType::class, [
                    'label'    => "I agree to the terms and conditions",
                    'required' => true,
                ])
                ->add('submit', SubmitType::class)
            ;
        }

}