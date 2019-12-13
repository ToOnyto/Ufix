<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
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
        $user->setFirstName("firstName");
        $user->setLastName("lastName");
        $user->setAdress("adress");
        $user->setPostCode(00000);
        $user->setCountry("country");
        $user->setCity("city");
        $manager->persist($user);

        $manager->flush();
    }
}
