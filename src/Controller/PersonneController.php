<?php

namespace App\Controller;

use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnesController extends AbstractController
{
    /**
     * @Route("/", name="personne")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Personne::class);

        //récupérer toutes les catégories
        $personnes = $repo->findAll();

        echo $this->render('home/index.html.twig', [
            'personne' => $personnes,
        ]);
    }
}
