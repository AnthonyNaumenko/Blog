<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddPostController extends Controller
{
    /**
     * @Route("/add", name="add_post")
     */
    public function index()
    {
        return $this->render('add_post/index.html.twig', [
            'controller_name' => 'AddPostController',
        ]);
    }
}
