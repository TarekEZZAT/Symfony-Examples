<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Video;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//
use App\Listeners\VideoCreatedListener;
use App\Events\VideoCreatedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;




class ManyToOneController extends AbstractController
{
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }
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
        $user3->setName("Jean");
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
     * @Route("/c00115/addvideos", name="addvideos")
     */
    public function index()
    {
 //       $video = new \stdClass();
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find(1);

        $entityManager = $this->getDoctrine()->getManager();
        for ($i = 1; $i <= 1; $i++) {
            $video = new Video();
            $video->setTitle('Video title -' . $i);


            $user->addVideo($video);
            $entityManager->persist($video);
            //$entityManager->flush();
            //$id = $video->getId();
            //dump($id);

            $event = new VideoCreatedEvent($video);
            $this->dispatcher->dispatch('video.created.event', $event);

        }

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('c00115/addvideos.html.twig', [
            'city_name' => 'Paris',
        ]);
    }

    /**
     * @Route("/c00115/viewdata", name="view_data")
     */
    public function viewdata()
    {

        $video = $this->getDoctrine()
            ->getRepository(Video::class)
            ->find(1);

        $title = $video->getTitle();

        $user = $video->getUser();
        $username1 = $video->getUser()->getName();

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(1);

        $username2 = $user->getName();
        $videos = $user->getVideos();


        return $this->render('c00115/viewdata.html.twig', [
            'title' => $title,
            'username1' => $username1,
            'username2' => $username2,
            'videos' => $videos,
        ]);
    }
}
