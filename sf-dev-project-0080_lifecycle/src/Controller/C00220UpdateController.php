<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;


class C00220UpdateController extends AbstractController
{
    /**
     * @Route("/c00220/update", name="c00220_update")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();

        $id = 20;
        $contact = $entityManager->getRepository(contact::class)->find($id);

        if (!$contact)
        {
            throw $this->createNotFoundException(
                'No contact found for id '.$id
            );
        }
        $contact->setName('Albert');
        $entityManager->flush();

        //dump($contact);
        return $this->render('c00220_update/index.html.twig', [
            'controller_name' => 'C00220UpdateController',
        ]);
    }
}
