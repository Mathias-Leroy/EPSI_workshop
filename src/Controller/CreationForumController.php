<?php

namespace App\Controller;


use App\Entity\Forum;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreationForumController extends AbstractController

{
    /**
     * @Route("/creation_forum", name="app_creation_forum")
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $forum = new Forum();
       

       // $form = $this->createForm(ForumType::class, $forum); 

        $form = $this->createFormBuilder($forum)
            ->add('Titre')
            ->add('Service')
            ->add('content' , TextareaType::class)   
           // ->add('image' )

            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $forum->setCreatedAt(new \DateTime());
            $forum->setUtilisateurId($this->getUser()->getId());

            $manager->persist($forum);
            $manager->flush();

            return $this->redirectToroute('forum_show', ['id' => $form->getId()
        ]);
        }
            
        return $this->renderForm('creation_forum/index.html.twig', [
            'form' => $form,

        ]);
    }
}
