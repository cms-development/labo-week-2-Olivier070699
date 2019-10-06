<?php

namespace App\Controller;

use App\Entity\Kampen;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PageController extends AbstractController{


    /**
     * @Route("/", name="home")
     */

    public function home(){
        $posts = $this->getDoctrine()
            ->getRepository(Kampen::class)
            ->findAll();

        return $this->render('home.html.twig', [
            'posts' => $posts
        ]);
    }



    /**
     *
     * @Route("/{id}", name="detailpage")
     *
     * @param $id
     * @return Response
     */

    public function detailpage($id){

        $post = $this->getDoctrine()
            ->getRepository(Kampen::class)
            ->find($id);

        return $this->render('detail.html.twig', [
           'post' => $post
        ]);

    }

    /**
     * Route("/create", name="create")
     *
     * @return Response
     */

    public function createProduct(){
        $entityManager = $this->getDoctrine()->getManager();

        $kampen = new Kampen();
        $kampen->setTitle('title');
        $kampen->setText('text');
        $kampen->setQuote('Ergonomic and stylish!');
        $kampen->setImage('https://www.sport.vlaanderen/media/6462/dsc_5794.jpg');
        $kampen->setDate('07/06/2020');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($kampen);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$kampen->getId());
    }

}

