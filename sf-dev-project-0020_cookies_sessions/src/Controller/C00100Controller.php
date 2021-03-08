<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/*


$response->headers->getCookies();

should return an array of cookies look in 
ResponseHeaderBag class
for more information about that function
This is the correct way of setting cookie.

To read cookie already written in the browser do:

$request->cookies->get('myCookie');

But after I created cookie in the $response object:

$cookie = new Cookie('myCookie', 'contentOfMyCookie');
$response = new Response();
$response->headers->setCookie($cookie);

I call this method:

$response->headers->getCookies();

I get an array of cookies, which are to be written 
in the browser

Figuratively, between $request and $response there is a time of executing controller's code.

Besides, in a twig template you can use

{{ app.request.cookies.get('myCookie') }}

you thus get value of the cookie already written in the browser, not that from the $response object!
 Newly created cookie from the browser you can read only after having reloaded page
 (ajax doesn't need to reload whole page).

To sum it up, you can read cookies using $request object,
and create them with $response object.
(Obviously, for some reasons, you can also read $response object cookies
- but these are rather rare situations).


*/
// Add a service "prize" to this controller
// also add a cookie
class C00100Controller extends AbstractController
{
    /**
     * @Route("/c00100/prizes", name="prizes")
     */
    public function index()
    {
        $users = ['Albert', 'Marie', 'Jean', 'Nathalie'];
        $prizes = ['Flowers','Bike','Travel','Money'];
        shuffle($prizes);
        return $this->render('c00100/index.html.twig', [
            'city_name' => 'Paris',
            'users' => $users,
            'random_gift' => $prizes
        ]);
    }
    

    /**
    * @Route("/c00100/cookies", name="cookies")
    */
    public function cookies(Request $request)
    {

        // use Symfony\Component\HttpFoundation\Cookie;
        // use Symfony\Component\HttpFoundation\Response;

        $sessionId = $request->cookies->get('PHPSESSID');

        $cookie = new Cookie(
            'time_cookie',          // Cookie name
            Date("r"),             // Cookie value
            time()+(165*24*60*60)   //expires after one year
        );

        // send the cookie to the browser by creating a response object

        $response =  new Response();
        $response->headers->setCookie($cookie);
        $response->send();

        $users = ['Albert', 'Marie', 'Jean', 'Nathalie'];
        $prizes = ['Flowers','Bike','Travel','Money'];
        shuffle($prizes);
        return $this->render('c00100/session.html.twig', [
            'city_name' => 'Paris',
            'users' => $users,
            'random_gift' => $prizes,
            'sessionId' => $sessionId
        ]);
    }


    
    /**
    * @Route("/c00100/session", name="session")
    */
    public function session(Request $request)
    {
        
        
/*
Make sure your session has been started otherwise Session::getId() returns am empty string (''). See Symfony/Component/HttpFoundation/Session/Storage/NativeSessionStorage

$session = $this->get('session');
$session->start();
$sessionId->setSessionId( $session->getId() );
*/


        // use Symfony\Component\HttpFoundation\Cookie;
        // use Symfony\Component\HttpFoundation\Response;

//        $sessionId = $request->cookies->get('PHPSESSID');

        $session = $this->get('session');
        $session->start();
        $sessionId = $session->getId();

        $cookie = new Cookie(
            'time_cookie',          // Cookie name
            Date("r"),             // Cookie value
            time()+(165*24*60*60)   //expires after one year
        );

        // send the cookie to the browser by creating a response object

        $response =  new Response();
        $response->headers->setCookie($cookie);
        $response->send();

        $users = ['Albert', 'Marie', 'Jean', 'Nathalie'];
        $prizes = ['Flowers','Bike','Travel','Money'];
        shuffle($prizes);
        return $this->render('c00100/session.html.twig', [
            'city_name' => 'Paris',
            'users' => $users,
            'random_gift' => $prizes,
            'sessionId' => $sessionId
        ]);
    }
}
