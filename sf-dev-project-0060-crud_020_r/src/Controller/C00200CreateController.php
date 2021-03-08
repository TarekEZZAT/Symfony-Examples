<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;

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



class C00200CreateController extends AbstractController
{
    /**
     * @Route("/c00200/create", name="c00200_create")
     */
    public function index()
    {
        // 1 create the entity manager 
        $entityManager = $this->getDoctrine()->getManager();
        // 2 create an entity
        $contact = new Contact();
        $contact->setName("Noah");
        $contact->setEmail("noah@email.com");

        $entityManager->persist($contact);
        $entityManager->flush();
        
        // make a redirection to list the inserted data
        //dump('Use added with id :  ' . $contact->getId());
        //$contactId = $contact->getId();

        //  $c00115Controller = new C00115Controller(); //
        //  $c00115Controller->listcontacts();
        //  exit();


        // return $this->render('c00200_create/index.html.twig', [
        //     'controller_name' => 'C00200CreateController',
        // ]);
    }
}
