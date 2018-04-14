<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function showFilms($id)
    {
        return $this->render('category/showFilms.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
