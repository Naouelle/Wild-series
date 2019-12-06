<?php
//src/Controller/WildController.php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * Show all rows from Program's entity
     *
     * @Route("/", name="wild_index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        if (!$programs) {
            throw $this->createNotFoundException(
                'No program found in program\'s table.'
            );
        }

        return $this->render(
            'wild/index.html.twig',
            ['programs' => $programs]
        );
    }


    /**
     * Getting a program with a formatted slug for title
     *
     * @param string $slug The slugger
     * @Route("/show/{slug<^[a-z0-9]+$>}", defaults={"slug" = null}, name="show")
     * @return Response
     */
    public function show(?string $slug): Response
    {
        if (!$slug) {
            throw $this
                ->createNotFoundException('No slug has been sent to find a program in program\'s table.');
        }
        $slug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($slug)), "-")
        );
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['title' => mb_strtolower($slug)]);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with ' . $slug . ' title, found in program\'s table.'
            );
        }

        return $this->render('wild/show.html.twig', [
            'program' => $program,
            'slug' => $slug,
        ]);
    }

        /**
         * Getting a list of program by category
         *
         * @param string $categoryName the category to use a filter
         * @Route("show/Category/{categoryName<^[a-z0-9-]+$>}", defaults={"categoryName" = null}, name="showByCategory")
         * @return Response
         */
        public function showByCategory(?string $categoryName): Response
        {
            if (!$categoryName) {
                throw $this
                    ->createNotFoundException('No slug has been sent to find a program in program\'s table');
            }

            $category = $this->getDoctrine()
                ->getRepository(Category::class)
                ->findOneByName($categoryName);

            if ($category) {
                throw $this->createNotFoundException(
                    'No category with '.$categoryName.' name, found in category\'s table.'
                );
            }

            if ($category) {
                $movies = $this->getDoctrine()
                    ->getRepository(Program::class)
                    ->findBy(['category' => $category],['id' => 'DESC'], 3);
            }

            $programs = $this->getDoctrine()
                ->getRepository(Program::class)
                ->findBy(
                    ['category' => $category],
                    ['id' => 'DESC'],
                    3
                );

            if (!$programs) {
                throw $this->createNotFoundException(
                    'No program with '.$categoryName.' name, found in program\'s table.'
                );
            }

            return $this->render('wild/category.html.twig', [
                'category' => $category,
                'programs' => $programs,
                'categoryName' => $categoryName
            ]);
        }
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






