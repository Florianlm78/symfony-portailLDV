<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Entity\Cours;
use App\Entity\User;
use App\Form\CoursType;
use App\Form\EvaluationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvaluationController extends AbstractController
{
    /**
     * @Route("/dashboard", name="evaluation")
     */

        public function index(Request $request): Response
        {   
            $em = $this->getDoctrine()->getManager();
    
            $evaluation = new Evaluation();
            $cours = new Cours();
            $form = $this->createForm(EvaluationType::class, $evaluation);
            $formCours = $this->createForm(CoursType::class, $cours);
            $form->handleRequest($request);
            $formCours->handleRequest($request);
    
            if($form->isSubmitted() && $form->isValid()){
                $em->persist($evaluation);
                $em->flush();
    
                $this->addFlash('success', 'Evaluation ajouté');
            }

            if($formCours->isSubmitted() && $formCours->isValid()){
                $em->persist($cours);
                $em->flush();
    
                $this->addFlash('success', 'Cours ajouté');
            }
    
            $evaluations = $em->getRepository(Evaluation::class)->findAll();
            $desCours = $em->getRepository(Cours::class)->findAll();
            $users = $em->getRepository(User::class)->findAll();
    
            return $this->render('evaluation/index.html.twig', [
                'evaluations' => $evaluations,
                'ajout' => $form->createView(),
                'desCours' => $desCours,
                'ajoutCours' => $formCours->createView(), 
                'users' => $users,
            ]);
        }


            /**
         * @Route("/dashboard/{id}", name="evaluation")
         */
        public function show(Request $request): Response {
            $em = $this->getDoctrine()->getManager();
            $evaluations = $em->getRepository(Panier::class)->findAll();            
        

        return $this->render('evaluation/show.html.twig', [
            'evaluations' => $evaluations,
        ]);


    

       
    
    }

