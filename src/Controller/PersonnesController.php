<?php

namespace App\Controller;

use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnesController extends AbstractController
{
    /**
     * @Route("/personnes", name="personnes")
     */
    public function index(): Response
    {

        //recuperer le repository
        $repository=$this->getDoctrine()->getRepository(Personne::class);
        //je lis la BDD
        $personnes=$repository->findALL();

        return $this->render('personnes/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }
}
