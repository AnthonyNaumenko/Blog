<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostPageController extends Controller
{
    /**
     * @Route("/post", name="post_page")
     */
    public function index()
    {
        return $this->render('post_page/index.html.twig', [
            'controller_name' => 'PostPageController',
        ]);
    }
}
