<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant/list", name="liste_etudiant")
     */
    public function index(EtudiantRepository $EtudiantRepository)
    {
        $etudiants= $EtudiantRepository->findAll();
        return $this->render('etudiant/listeEtudiant.html.twig', compact("etudiants")
        );
    }


     /**
     * @Route("etudiant/add", name="addEtudiant")
     */

    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $rp= $em->getRepository(Etudiant::class);
        $matricule=count($rp->findAll());
        $etudiant= new Etudiant();
        $form= $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('liste_etudiant');
        }
        // dd($form);
        return $this->render('etudiant/create.html.twig',[
            'form'=>$form->createView(),
            'matricule' => $matricule
        ]
        
    );
    }

    /**
     * @Route("/etudiant/{id}/edit", name="edit_etudiant")
     */
    public function edit(Request $request, EntityManagerInterface $em, etudiant $etudiant): Response
    {
        $rp= $em->getRepository(Etudiant::class);
        $matricule=count($rp->findAll());
        $form= $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // $em->persist($etudiant);
            $em->flush();
            $this->addFlash('success', 'vous avez modifier');
            return $this->redirectToRoute('liste_etudiant');
        }
        // dd($form);
        return $this->render('etudiant/create.html.twig',[
            'etudiant'=>$etudiant,
            'form'=>$form->createView(),
            'matricule' => $matricule
        ]);

    }


}

