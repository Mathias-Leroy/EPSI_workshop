<?php

namespace App\Controller;

use App\Entity\forum;
use App\Form\ForumType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
     */
    public function index()
    {
        return $this->render('forum/index.html.twig', [
            'controller_name' => 'ForumController',
        ]);
    }

    public function new(Request $request): Response
    {
    
        // creates a task object and initializes some data for this example
        $forum = new Forum();
        $forum->setForum('Write a blog post');
        $forum->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(ForumType::class, $forum);

        return $this->renderForm('forum/new.html.twig', [
            'form' => $form,
        ]);
    
    }
}
