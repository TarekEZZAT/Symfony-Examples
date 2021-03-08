<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class C00115Controller extends AbstractController
{
    /**
     * @Route("/c00115/addusers", name="addusers")
     */
    public function addusers()
    {
                //$users = ['Albert', 'Marie', 'Jean', 'Nathalie'];

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


        return $this->render('c00115/addusers.html.twig', [
            'city_name' => 'Paris',

            ]);

    }

    
 
    /**
    * @Route("/c00115/listusers", name="listusers")
    */
    public function listusers()
    {

        $users = $this->getDoctrine()->getRepository(user::class)->findAll();
 
        return $this->render('c00115\listusers.html.twig', [
            'country_name' => 'Paris',
            'users' => $users,
        ]);


    }

    

}
