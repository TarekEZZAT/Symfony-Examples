<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class ManyToManyController extends AbstractController
{
    /**
     * @Route("/c00120/makedata", name="make_data_m2m")
     */
    public function addusers()
    {
        $entityManager = $this->getDoctrine()->getManager();

        for ($i = 1; $i <= 4; $i++) {
            $user = new User();
            $user->setName('Robert -' . $i);
            $entityManager->persist($user);
        }
        $entityManager->flush();
        //dump('last user id - '.$user->getId());


        return $this->render('c00120/addusers.html.twig', [
            'city_name' => 'Paris',
        ]);
    }

    /**
     * @Route("/c00120/addfolloweds", name="make_followeds")
     */
    public function addFolloweds()
    {
        $entityManager = $this->getDoctrine()->getManager();


        $user1 = $entityManager->getRepository(User::class)->find(1);
        $user2 = $entityManager->getRepository(User::class)->find(2);
        $user3 = $entityManager->getRepository(User::class)->find(3);
        $user4 = $entityManager->getRepository(User::class)->find(4);

        $user1->addFollowed($user2);
        $user1->addFollowed($user3);
        $user1->addFollowed($user4);
        $entityManager->flush();

        //  dump($user1->getFollowed()->count());
        //  dump($user1->getFollowing()->count());
        //  dump($user4->getFollowing()->count());

        return $this->render('many_to_many/index.html.twig', [
            'controller_name' => 'DefaultController',
            'data_added' => 'Followers added'
        ]);
    }

    /**
     * @Route("/c00120/addfollowings", name="make_followings")
     */
    public function addFollowings()
    {
        $entityManager = $this->getDoctrine()->getManager();


        $user1 = $entityManager->getRepository(User::class)->find(1);
        $user2 = $entityManager->getRepository(User::class)->find(2);
        $user3 = $entityManager->getRepository(User::class)->find(3);
        $user4 = $entityManager->getRepository(User::class)->find(4);

        $user3->addFollowing($user2);
        $user3->addFollowing($user4);
        $entityManager->flush();


        return $this->render('many_to_many/index.html.twig', [
            'controller_name' => 'DefaultController',
            'data_added' => 'Followings added'
        ]);
    }



    /**
    * @Route("/c00120/viewfolloweds", name="viewfolloweds")
    */
    public function viewfolloweds()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user1 = $entityManager->getRepository(User::class)->find(1);
        $user2 = $entityManager->getRepository(User::class)->find(2);
        $user3 = $entityManager->getRepository(User::class)->find(3);
        $user4 = $entityManager->getRepository(User::class)->find(4);

        $followeds1 = $user1->getFollowed();
        $followeds2 = $user2->getFollowed();
        $followeds3 = $user3->getFollowed();
        $followeds4 = $user4->getFollowed();



        //  dump($user1->getFollowed()->count());
        //  dump($user1->getFollowing()->count());
        //  dump($user4->getFollowing()->count());

        return $this->render('many_to_many/followeds.html.twig', [
            'controller_name' => 'DefaultController',
            'user1' => $user1,
            'followeds1' => $followeds1,
            'user2' => $user2,
            'followeds2' => $followeds2,
            'user3' => $user3,
            'followeds3' => $followeds3,
            'user4' => $user4,
            'followeds4' => $followeds4,

        ]);
    }



    /**
    * @Route("/c00120/viewfollowings", name="viewfollowings")
    */
    public function viewFollowings()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user1 = $entityManager->getRepository(User::class)->find(1);
        $user2 = $entityManager->getRepository(User::class)->find(2);
        $user3 = $entityManager->getRepository(User::class)->find(3);
        $user4 = $entityManager->getRepository(User::class)->find(4);

        $followings1 = $user1->getFollowing();
        $followings2 = $user2->getFollowing();
        $followings3 = $user3->getFollowing();
        $followings4 = $user4->getFollowing();



        //  dump($user1->getFollowing()->count());
        //  dump($user1->getFollowing()->count());
        //  dump($user4->getFollowing()->count());

        return $this->render('many_to_many/followings.html.twig', [
            'controller_name' => 'DefaultController',
            'user1' => $user1,
            'followings1' => $followings1,
            'user2' => $user2,
            'followings2' => $followings2,
            'user3' => $user3,
            'followings3' => $followings3,
            'user4' => $user4,
            'followings4' => $followings4,

        ]);
    }
}