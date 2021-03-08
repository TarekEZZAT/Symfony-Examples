<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;

class C00115Controller extends AbstractController
{
    /**
     * @Route("/c00115/addcontacts", name="addcontacts")
     */
    public function addcontacts()
    {
                //$contacts = ['Albert', 'Marie', 'Jean', 'Nathalie'];

        $entityManager = $this->getDoctrine()->getManager();

        $contact1 = new Contact;
        $contact1->setName("Albert");
        $contact1->setEmail("albert@email.com");
        $entityManager->persist($contact1);

        $contact2 = new Contact;
        $contact2->setName("Marie");
        $contact2->setEmail("marie@email.com");
        $entityManager->persist($contact2);

        $contact3 = new Contact;
        $contact3 ->setName("Jean");
        $contact3->setEmail("jean@email.com");
        $entityManager->persist($contact3);

        $contact4 = new Contact;
        $contact4->setName("Nathalie");
        $contact4->setEmail("nathalie@email.com");
        $entityManager->persist($contact4);

        $entityManager->flush();


        return $this->render('c00115/addcontacts.html.twig', 
            [
            'city_name' => 'Paris',
            ]);

    }

    
 
    /**
    * @Route("/c00115/listcontacts", name="listcontacts")
    */
    public function listcontacts()
    {

        $contacts = $this->getDoctrine()->getRepository(Contact::class)->findAll();
 
        return $this->render('c00115\listcontacts.html.twig', [
            'country_name' => 'Paris',
            'contacts' => $contacts,
        ]);


    }

    

}
