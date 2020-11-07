<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Entity\Cours;
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
    
            return $this->render('evaluation/index.html.twig', [
                'evaluations' => $evaluations,
                'ajout' => $form->createView(),
                'desCours' => $desCours,
                'ajoutCours' => $formCours->createView()
            ]);
        }

       
    
    }

