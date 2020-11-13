<?php

namespace App\Controller;


use App\Entity\Personne;
use App\Form\PersonneSupprimerType;
use App\Form\PersonneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnesController extends AbstractController
{
    /**
     * @Route("/", name="personnes")
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

    /**
     * @Route("/personnes/ajouter",name="personnes_ajouter")
     */
    public function ajouter(Request $request){

        $personnes=new Personne();

        //creation du formulaire
        $form=$this->createForm(PersonneType::class, $personnes);


        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //récupération de l'entity
            $em=$this->getDoctrine()->getManager();


            $em->persist($personnes);

            //dire au manager qu'on veut garder notre objet en BDD
            $em->flush();

            //aller à la liste des chatons
            return $this->redirectToRoute("personnes");
        }

        return $this->render("personnes/personnes_ajouter.html.twig", [
            "formulaire"=>$form->createView()
        ]);
    }

    /**
     * @Route("personnes/modifier/{id}",name="personnes_modifier")
     */
    public function modifier($id, Request $request)
    {

        $repo=$this->getDoctrine()->getRepository(Personne::class);
        $personnes=$repo->find($id);


        $form=$this->createForm(PersonneType::class, $personnes);


        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //récupération de l'entity
            $em=$this->getDoctrine()->getManager();

            //dire au manager qu'on veut garder notre objet en BDD
            $em->persist($personnes);

            //generer l'update
            $em->flush();

            //
            return $this->redirectToRoute("personnes",["idPersonnes"=>$personnes->getId()]);
        }

        return $this->render("personnes/personnes_modifier.html.twig", [
            "formulaire"=>$form->createView()
        ]);
    }

    /**
     * @Route("/personnes/supprimer/{id}",name="personnes_supprimer")
     */
    public function supprimer($id, Request $request)
    {
        //Aller chercher la catégorie dans la BDD
        $repo=$this->getDoctrine()->getRepository(Personne::class);
        $personne = $repo->find($id);

        //création du formulaire
        $form = $this->createForm(PersonneSupprimerType::class, $personne);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //récupération de l'entityManager
            $em = $this->getDoctrine()->getManager();

            //dire au manager qu'on veut garder notre objet en BDD
            $em->remove($personne);


            $em->flush();


            return $this->redirectToRoute("personnes");
        }

        return $this->render("personnes/personnes_supprimer.html.twig", [
            "formulaire" => $form->createView(),
            "personne"=>$personne
        ]);
    }
}
