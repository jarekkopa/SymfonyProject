<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FilmController extends Controller
{
    public function showFilm($id)
    {
        return $this->render('film/showFilm.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }
}
