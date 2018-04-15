<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\CategoryEntity;

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

    public function addCategory()
    {
        $category = new CategoryEntity();
        $category->setName('PHP');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->flush();
        return $this->redirectToRoute('index');
    }

    public function showCategories()
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository(categoryEntity::class)
            ->findAll();

        return $this->render('category/showCategories.html.twig', [
            'categories' => $categories,
        ]);
    }
}
