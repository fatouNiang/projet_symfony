<?php

namespace App\Controller;


use App\Entity\Chambre;
use App\Form\ChambreType;
use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre")
     */
    public function index(ChambreRepository $chambreRepository, PaginatorInterface $paginator , Request $request)
    {

        $chambres= $chambreRepository->findAll();

        $pagination= $paginator->paginate($chambres, $request->query->getInt('page', 1),5);

         return $this->render('chambre/listeChambre.html.twig',[
        //   compact("pagination")
            // 'controller_name' => 'ChambreController',
             'chambres' => $pagination
            ]);
    }
     /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('chambre/home.html.twig');
    }

    /**
     * @Route("chambre/add", name="addRoom")
     */

    public function create(Request $request,ChambreRepository $repo, EntityManagerInterface $em):Response
    {
        $repo= $em->getRepository(Chambre::class);
        $numero =count($repo->findAll()) ;
        $chambre= new Chambre();
        $form= $this->createForm(ChambreType::class, $chambre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($chambre);
            $em->flush();
            $this->addFlash('ajout','insertion reussi');
            return $this->redirectToRoute('chambre');
        }
        // dd($form);
        return $this->render('Chambre/create.html.twig',[
            'form'=>$form->createView(),
            'numero'=>$numero

        ]
        
    );
    }
/**
     * @Route("/chambre/{id}/edit", name="edit_chambre")
     */
    public function edit(Request $request, EntityManagerInterface $em, Chambre $chambre): Response
    {
        $repo= $em->getRepository(Chambre::class);
        $numero =count($repo->findAll()) ;
        $form= $this->createForm(ChambreType::class, $chambre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // $em->persist($etudiant);
            $em->flush();
            $this->addFlash('success', 'vous avez modifier');
            return $this->redirectToRoute('chambre');
        }
        // dd($form);
        return $this->render('chambre/create.html.twig',[
            'chambre'=>$chambre,
            'form'=>$form->createView(),
            'numero'=>$numero
        ]);

    }

    
    
    /**
     * @Route("chambre/{id}/delete", name="chambre_delete")
     */
    public function delete(EntityManagerInterface $em, Chambre $chambre){

        $em->remove($chambre);
        $em->flush();
        return $this->redirectToRoute('chambre'); 
    }

}
