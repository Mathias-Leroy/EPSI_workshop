<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessagerieController extends AbstractController
{
    /**
     * @Route("/messagerie", name="messagerie")
     */
    public function index()
    {
        return $this->render('messagerie/index.html.twig', [
            'controller_name' => 'MessagerieController',
        ]);
    }
}
