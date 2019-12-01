<?php
//src/Controller/WildController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wild", name="wild_")
 */
class WildController extends AbstractController
{
     /**
     * @Route("/", name="index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('wild/index.html.twig',[
            'website' => 'Wild Séries'
        ]);
    }

    /**
     * @Route("/show/{slug}", requirements={"slug"="\b[a-z0-9\-]+\b"}, name="show")
     * @param string $slug
     * @return Response
     */
    public function show(string $slug = "noslug"): Response
    {
        $result = str_replace("-", " ", ucwords($slug));
        return $this->render('wild/show.html.twig', ['result' => $result]);
    }

    /**
     * Créer une nouvelle série
     * @Route("/wild/new", methods={"POST"}, name="wild_new")
     */



    /**
     * Afficher une série par identifiant
     * @Route("/wild/{id}" , methods={"GET"}, name="wild_show")
     */



    /**
     * Supprimer une série
     * @Route("/wild/{id}", methods={"DELETE"}, name="wild_delete")
     */
}





