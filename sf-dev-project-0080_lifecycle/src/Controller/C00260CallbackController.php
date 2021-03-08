<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
class C00260CallbackController extends AbstractController
{
    /**
     * @Route("/c00260/callback", name="c00260_callback")
     */
    public function index()
    // Callback statements are in the Entity definition
    {
        $entityManager = $this->getDoctrine()->getManager();
        $contact = new Contact();
        $contact->setName('Elodie');
        $contact->setEmail('elodie@email.com');
        //$contact->setTimestamp();
        $entityManager->persist($contact);
        $entityManager->flush();
        sleep(5);
        $contact->setName('Melodie');
        $contact->setEmail('melodie@email.com');
        //$contact->setTimestamp();
        $entityManager->persist($contact);
        $entityManager->flush();

        

        return $this->render('c00260_callback/index.html.twig', [
            'controller_name' => 'C00260CallbackController',
        ]);
    }
}
