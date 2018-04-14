<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function login()
    {
        \dump(get_called_class());
        \dump(debug_backtrace()[0]['function']);
        die();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    public function showUserDetails($id)
    {
        \dump(get_called_class());
        \dump(debug_backtrace()[0]['function']);
        die();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
