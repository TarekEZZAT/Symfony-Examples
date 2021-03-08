<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;

class C00210ReadController extends AbstractController
{
    /**
     * @Route("/c00210/readAll", name="c00210_read_all")
     */
    public function findAll()
    {
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $contacts = $repository->findAll();
 
        return $this->render('c00210_read/index.html.twig', [
            'function' => 'findAll()',
            'description' => 'finds all records in the table',
            'contacts' => $contacts,
        ]);
    }


    /**
     * @Route("/c00210/readOne", name="c00210_read_one")
     */
        public function findId()
    {
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $contacts = $repository->find(17);
 
        return $this->render('c00210_read/index.html.twig', [
            'function' => 'find(<id>)',
            'description' => 'finds the with the given Id',
            'contacts' => $contacts,
        ]);
    }

    /**
     * @Route("/c00210/readOneBy", name="c00210_read_one")
     */
        public function findOneBy()
    {
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $contact = $repository->findOneBy(['email'=>'name - 4@email']);
 
        return $this->render('c00210_read/index.html.twig', [
            'function' => 'find(<id>)',
            'description' => 'finds the with the given Id',
            'contact' => $contact,
        ]);
    }

}