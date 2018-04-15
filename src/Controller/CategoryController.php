<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\CategoryEntity;

class CategoryController extends Controller
{
    public function showFilms($id)
    {
        $category = new CategoryEntity();
        $category->setName('Symfony');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->flush();

        return $this->render('category/showFilms.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
