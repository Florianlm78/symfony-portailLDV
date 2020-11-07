<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Form\EvaluationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvaluationController extends AbstractController
{
    /**
     * @Route("/", name="evaluation")
     */

        public function index(Request $request): Response
        {   
            $em = $this->getDoctrine()->getManager();
    
            $evaluation = new Evaluation();
            $form = $this->createForm(EvaluationType::class, $evaluation);
            $form->handleRequest($request);
    
            if($form->isSubmitted() && $form->isValid()){
                $em->persist($evaluation);
                $em->flush();
    
                $this->addFlash('success', 'Evaluation ajouté');
            }
    
            $evaluations = $em->getRepository(Evaluation::class)->findAll();
    
            return $this->render('evaluation/index.html.twig', [
                'evaluations' => $evaluations,
                'ajout' => $form->createView()
            ]);
        }
    
    }

