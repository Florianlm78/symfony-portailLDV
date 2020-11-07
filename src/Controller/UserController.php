<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function show(User $user = null, Request $request){ // converti automatiquement l'id en une catégorie
        if($user == null){ // On n'a pas trouvé de user correspondant à l'id
            $this->addFlash(
                'erreur',
                'L\'User est introuvable'
            );
            return $this->redirectToRoute('user');
        }

        return $this->render('user/show.html.twig', [
            'users' => $user,
        ]);
    }


    
}