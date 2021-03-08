<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftService;



/*
commands

To install doctrine (if needed)
composer require doctrine

To install ORM
composer require orm

in .env file
To create an SQLite database (sydata.db)
php bin/console doctrine:database:create

To create a MySQL database (sydata)
** for MySQL start MySQL server first
php bin/console doctrine:database:create

To create an entity
php bin/console make:entity <entity-name>
--
php bin/console make:entity User

--
php bin/console make:migration



*/
class C00110Controller extends AbstractController
{
    /**
     * @Route("/c00110/addusers", name="addusers")
     */
    public function addusers()
    {
        // $users = ['Albert', 'Marie', 'Jean', 'Nathalie']; to put in a database

       $entityManager = $this->getDoctrine()->getManager();

        $user1 = new User;
        $user1->setName("Albert");
        $entityManager->persist($user1);

        $user2 = new User;
        $user2->setName("Marie");
        $entityManager->persist($user2);

        $user3 = new User;
        $user3 ->setName("Jean");
        $entityManager->persist($user3);

        $user4 = new User;
        $user4->setName("Nathalie");
        $entityManager->persist($user4);

        $entityManager->flush();

        return $this->render('c00110\addusers.html.twig', [
            'city_name' => 'Paris',
        ]);

    }


    /**
    * @Route("/c00110/listusers", name="listusers")
    */
    public function listusers(GiftService $giftsPackage)
    {

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
 
        return $this->render('c00110\listusers.html.twig', [
            'country_name' => 'Paris',
            'users' => $users,
            'random_gift'=>$giftsPackage->gifts
        ]);


    }
}
