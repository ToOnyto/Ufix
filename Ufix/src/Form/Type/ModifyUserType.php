<?php


namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\User;





use Symfony\Component\Form\FormBuilderInterface;

class ModifyUserType extends AbstractType
{

        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            // dump($options['data']);
            // die;
            $builder
                ->add('firstName', TextType::class, [
                    'label'    => "Prénom",
                    'attr'     => [
                        'current'  => $options['data']->getFirstName()
                    ]
                    

                ])
                ->add('lastName', TextType::class, [
                    'label'    => "Nom",
                    'attr'     => [
                        'current'  => $options['data']->getLastName()
                    ]
                    
                ])
                ->add('adress', TextType::class, [
                    'label'    => "Adresse",
                    'attr'     => [
                        'current'  => $options['data']->getAdress()
                    ]
                    

                ])
                ->add('postCode', NumberType::class, [
                    'label'    => "Code postal",
                    'attr'     => [
                        'current'  => $options['data']->getPostCode()
                    ]
                    
                ])
                ->add('country', TextType::class, [
                    'label'    => "Pays",
                    'attr'     => [
                        'current'  => $options['data']->getCountry()
                    ]
                    
                ])
                ->add('city', TextType::class, [
                    'label'    => "Ville",
                    'attr'     => [
                        'current'  => $options['data']->getCity()
                    ]
                    
                ])
                ->add('submit', SubmitType::class)
            ;
        }

}