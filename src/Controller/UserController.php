<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
