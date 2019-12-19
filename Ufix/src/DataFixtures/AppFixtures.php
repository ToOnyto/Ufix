<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Product;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{

    private $passwordEncoder;

public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
   $this->passwordEncoder = $passwordEncoder;
}

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail("leo@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'leo'));
        $user->setRoles(['ROLE_CLASSIC']);
        $user->setFirstName("leo");
        $user->setLastName("bar");
        $user->setAdress("343 Oak Avenue");
        $user->setPostCode(07601);
        $user->setCountry("France");
        $user->setCity("Bordeaux");
        $manager->persist($user);

        $user = new User();
        $user->setEmail("thomas@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'thomas'));
        $user->setRoles(['ROLE_CLASSIC']);
        $user->setFirstName("thomas");
        $user->setLastName("deasington");
        $user->setAdress("Lieu-dit du cambodge");
        $user->setPostCode(63333);
        $user->setCountry("Suède");
        $user->setCity("Kattegat");
        $manager->persist($user);

        // $product = new Product();
        // $product->setCategory(0);
        // $product->setName('Iphaone Plus 13');
        // $product->setbreakState('Ecran rayé + batterie qui coule');
        // $product->setPrice(60);
        // $product->setDescription('Je vous présente mon Iphaone Plus 13 qui est cassé, je le vend car il est cassé et ça coule.');
        // $product->setPurpose(0);
        // $product->setUser($user);
        // $manager->persist($product);

        // $product = new Product();
        // $product->setCategory(0);
        // $product->setName('Samsunf Galaxy s3');
        // $product->setbreakState('Pixel mort sur tout l\'écran');
        // $product->setPrice(5);
        // $product->setDescription('On voit plus rien donc je le vend, commercialement votre');
        // $product->setPurpose(0);
        // $product->setUser($user);
        // $manager->persist($product);
        
        // $product = new Product();
        // $product->setCategory(0);
        // $product->setName('Ouiqo');
        // $product->setbreakState('Prise jack ne marche plus');
        // $product->setPrice(150);
        // $product->setDescription('Mon Ouiqo est tombé dans le sable en vacances et la prise Jack ne fonctionne plus');
        // $product->setPurpose(1);
        // $product->setUser($user);
        // $manager->persist($product);

        // $product = new Product();
        // $product->setCategory(0);
        // $product->setName('Nokia lumia 520');
        // $product->setbreakState('Trop vieux');
        // $product->setPrice(150);
        // $product->setDescription('Mon telephone est devenu lent sur toutes les applications récentes');
        // $product->setPurpose(1);
        // $product->setUser($user);
        // $manager->persist($product);

        $manager->flush();
    }
}
