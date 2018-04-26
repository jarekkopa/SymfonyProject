<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\UserEntity;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function login()
    {
        return $this->render('user/login.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    public function showUserDetails($id)
    {
        return $this->render('user/showUserDetails.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    public function addUser(Request $request)
    {
        $newUser = new UserEntity();
        $form = $this->createFormBuilder($newUser)
            ->add('login', TextType::class)
            ->add('password', TextType::class)
            ->add('email', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newUser);
            $entityManager->flush();
    
            return $this->redirectToRoute('categories'); 
        }

        return $this->render('user/new.html.twig', [
            'controller_name' => 'UserController',
            'form' => $form->createView(),
        ]);
    }
}
