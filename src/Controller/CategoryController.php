<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\CategoryEntity;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class CategoryController extends Controller
{
    public function showFilms($id)
    {
        $category = $this
            ->getDoctrine()
            ->getRepository(categoryEntity::class)
            ->find($id);
        \dump($category);
            
        return $this->render('category/showFilms.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    public function addCategory(Request $request)
    {
        // $category = new CategoryEntity();
        // $category->setName('PHP');

        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist($category);
        // $entityManager->flush();
        // return $this->redirectToRoute('index');

        $category = new CategoryEntity();
        $form = $this->createFormBuilder($category)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('categories'); 
        }

        return $this->render('category/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    public function showCategories()
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository(categoryEntity::class)
            ->findHiddenCategories();

        return $this->render('category/showCategories.html.twig', [
            'categories' => $categories,
        ]);
    }

    public function filter($letter)
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository(categoryEntity::class)
            ->findCategoriesByLetter($letter);

        return $this->render('category/showCategories.html.twig', [
            'categories' => $categories,
        ]);
    }
}
