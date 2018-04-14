<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FilmController extends Controller
{
    public function showFilm($id)
    {
        \dump(get_called_class());
        die();
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }
}
