<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class C00120Controller extends AbstractController
{
    /**
     * @Route("/c00120/getdata", name="getdata")
     */
    public function index(Request $request)
    {
        $page =$request->query->get('page','default');
        $post =$request->server->get('HTTP_POST');
        $requestType = $request->isXmlHttpRequest();
        $page2 = $request->request->get('page2');
        $data_file = $request->files->get('data_file');
        

        return $this->render('c00120/index.html.twig', [
            'controller_name' => 'C00120Controller',
            'page' => $page,
            'post' => $post,
            'requestType' => $requestType,
            'page2'=> $page2,
            'data_file' => $data_file
        ]);
    }
}
