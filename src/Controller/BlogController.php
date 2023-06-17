<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

class BlogController extends AbstractController
{
    private $entityManager;
    #[Route('/blog', name: 'app_blog')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->entityManager = $entityManager;
        $articleRepository = $this->entityManager->getRepository(Article::class);
        $articles = $articleRepository->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'title' => "Bienvenue sur le blog Symfony",
            'age' => 31
        ]);
    }


}