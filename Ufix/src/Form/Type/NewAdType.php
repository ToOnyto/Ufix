<?php


namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;






use Symfony\Component\Form\FormBuilderInterface;

class NewAdType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => array(
                    'Téléphone' => 0,
                    'Tablette' => 1 ,
                    'Ordinateur' => 2
                ),
                'placeholder' => 'Catégorie',

            ])
            ->add('name', TextType::class, [
                'label'    => "Nom du produit",
            ])
            ->add('breakState', TextType::class, [
                'label'    => "Etat du produit",
            ])
            ->add('purpose', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => array(
                    'Vendre' => 0,
                    'Faire réparer' => 1 ,
                ),
                'expanded' => true,
                'multiple' => false,
                'required' => true,
                // 'placeholder' => 'Catégorie',

            ])
            ->add('description', TextareaType::class, [
                'label'    => "Description du produit",
            ])
            ->add('price', NumberType::class, [
                'label'    => "Prix",
            ])
            ->add('submit', SubmitType::class);
    }
}
