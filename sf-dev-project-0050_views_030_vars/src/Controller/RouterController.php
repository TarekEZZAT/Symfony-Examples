<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class RouterController extends AbstractController
{
    /**
     * @Route("/router", name="router")
     */
    public function index()
    {
        return $this->render('router/index.html.twig', [
            'info : ' => 'Simple Controller :  @Route("/router"',
            'controller_name' => 'RouterController',
        ]);
    }

    /**
     * @Route("/info/{page}", name="paged" , requirements =  {"page" = "\d+"})
     */
    public function paged()
    {

        return new Response (
            'Paged Controller : @Route("/info/{page}", name="paged" , requirements =  {"page" = "\d+"})
            <BR> 
            ---> {page} : pages are mandatory and must be a decimal number');
    }


    /**
     * @Route("/list/{page?}", name="optpaged" , requirements =  {"page" = "\d+"})
     */
    public function optpaged()
    {

        return new Response (
            'Paged Controller : @Route("/info/{page?}", name="paged" , requirements =  {"page" = "\d+"})
            <BR> 
            ---> {page?} : pages are optional and must be a decimal number');
    }


    // /**
    //  * @Route(
    //  * "/articles/{_locale}/{year}/{slug}/{category}",
    //  *      defaults={"category":"computers"},
    //  *      requirements = {
    //  *      "_locale" = "en|fr|it",
    //  *      "category" = "computers|rtv",
    //  *      "year" = "\d+"
    //  *      }
    //  */


    /**
     * @Route("/articles/{_locale}/{year}/{slug}/{category}", 
     * name="optpaged2" , 
     * defaults = {"category" : "computers" },
     * requirements =  {
     * "_locale" = "en|fr|it",
     * "category" : "computers|tv|mobiles",
     * "year" = "\d+"
     * })
     */
     public function optpaged2()
    {

        return new Response (
   '  @Route(
           <BR>
           /articles/{_locale}/{year}/{slug}/{category}
            <BR>
           defaults={"category":"computers"}
            <BR>
           requirements = {
            <BR>
           _locale = "en|fr|it",
            <BR>
           category = "computer|rtv",
            <BR>
           year = "\d+"
        '
        );
    }



}
