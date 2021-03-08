<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\contact;
use Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;




class AppFixtures extends Fixture
{
    
    // runs automatically with make:fixture command
    public function load(ObjectManager $manager)
    
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1; $i<=5; $i++)
        {
            $contact = new contact();
            $contact->setName('name - ' . $i);
            $contact->setEmail('name - ' . $i . '@email');

            $manager->persist($contact);
        }

        $manager->flush();

                // make a redirection to list the inserted data

    }
}

