<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EditPostController extends Controller
{
    /**
     * @Route("/edit", name="edit_post")
     */
    public function index()
    {
        return $this->render('edit_post/index.html.twig', [
            'controller_name' => 'EditPostController',
        ]);
    }
}
