<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class C00240RawQueriesController extends AbstractController
{
    /**
     * @Route("/c00240/queries", name="c00240_raw_queries")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();

        $cn = $entityManager->getConnection();
        $sql = '
        SELECT * FROM contact c
        WHERE c.id > :id
        ';
        $stmt = $cn->prepare($sql);
        $stmt->execute(['id' => 22]);

        //dump($stmt->fetchAll());
        $contacts =  $stmt->fetchAll();

        return $this->render('c00210_read/index.html.twig', [
            'function' => 'findAll()',
            'description' => 'finds all records in the table',
            'contacts' => $contacts,
        ]);

    }
}
