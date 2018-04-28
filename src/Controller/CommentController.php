<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\UserEntity;
use App\Entity\CommentEntity;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    public function newComment(Request $request)
    {
        $comment = new CommentEntity();
        $form = $this->createFormBuilder($comment)
            ->add('comment', TextType::class)
            ->add('user', EntityType::class, [
                'class' => UserEntity::class,
            ])
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
        
            return $this->redirectToRoute('users'); 
        }

        return $this->render('comment/addComment.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
