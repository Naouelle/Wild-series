<?php
//src/Controller/WildController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
     /**
     * @Route("/wild", name="wild_index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('wild/index.html.twig',[
            'website' => 'Wild Séries'
        ]);
    }

    /**
     * @Route("/wild/show/{slug}", requirements={"slug"="[a-z0-9\-]+"},
     * name="wild_show",
     * defaults={"slug"="Aucune série sélectionnée, veuillez choisir une série"})
     */
    public function show($slug): Response
    {
        $noSeries = "Aucune série sélectionnée, veuillez choisir une série";
        if ($slug =="") {
            $slug = $noSeries;
        } else {
            $slug = str_replace('-', ' ', $slug);
            $slug = ucwords($slug);
        }
        return  $this->render('wild/show.html.twig', [
            'slug' => $slug
        ]);
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





