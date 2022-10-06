<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\forum;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
    
            $form = $this->createFormBuilder($forum)
                ->add('Titre', TextType::class)
               
                ->add('save', SubmitType::class, ['label' => 'Create Task'])
                ->getForm();
                
                return $this->renderForm('forum/new.html.twig', [
                    'form' => $form,
                ]);
            // ...
        
        
        }

    

    
    

}
    

