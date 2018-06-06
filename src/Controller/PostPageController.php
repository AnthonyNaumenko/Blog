<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\AddFormPostType;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostPageController extends Controller
{
    /**
     * @Route("/post/{id}", name="post_page")
     */
    public function postPage(Post $post, Request $request, EntityManagerInterface $entityManager)
    {

        $comment = new Comment();

        $comment->setPost($post);

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($comment);
            $entityManager->flush();
            $id = $comment->getId();

            return $this->redirectToRoute('post_success',[
                'id'=>$id,
            ]);
        }

        $repo = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $repo->findAll();

       /* $repo = $this->getDoctrine()->getRepository(Comment::class);
        $comment = $repo->findBy(array(),array('DateTime' => 'DESC'));*/

        return $this->render('post_page/postPage.html.twig', [
            'post' => $post,
            'comment' => $comment,
            'comments'=>$comments,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/add", name="post_add")
     */
    public function postAddPage(Request $request, EntityManagerInterface $entityManager){

        $post = new Post();
        $form = $this->createForm(AddFormPostType::class,$post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($post);
            $entityManager->flush();
            $id = $post->getId();

            return $this->redirectToRoute('post_success',[
                'id'=>$id,
            ]);
        }

        return $this->render('post_page/postAdd.html.twig',[

            'form' => $form->createView(),
        ]);
    }

    /**
     *@Route("/post/{id}", name="post_success")
     */
    public function postSuccess(){
        return $this->render('post_page/postPage.html.twig');
    }

    /**
     *@Route("/edit/{id}", name="post_edit")
     */
    public function postEdit(Post $post, EntityManagerInterface $entityManager, Request $request){


        $form = $this->createForm(AddFormPostType::class,$post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($post);
            $entityManager->flush();
            $id = $post->getId();

            return $this->redirectToRoute('post_success',[
                'id'=>$id,
            ]);
        }
        return $this->render('post_page/postEdit.html.twig',[
            'post' => $post,
            'form' => $form->createView(),

        ]);

    }

    /**
     * @Route("/post", name="post_show")
     */
    public function postShow(){
        $repo = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repo->findAll();


        return $this->render('post_page/postShow.html.twig',[
            'posts'=>$posts
        ]);
    }

    /**
     * @Route("/post/{id}/delete", name="post_delete")
     */
    public function postDelete(Post $post)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($post);
        $entityManager->flush();

        return $this->redirectToRoute('post_show');
    }
}
