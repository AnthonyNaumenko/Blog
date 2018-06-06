<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * @Route("/", name="main_page")
     */
    public function index()
    {

        $repo = $this->getDoctrine()->getRepository(Post::class);
        $post = $repo->findBy(array(),array('date' => 'DESC'),3 ,null);


        return $this->render('main/index.html.twig',
        ['post'=>$post]
        );
    }


}
