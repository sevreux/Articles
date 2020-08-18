<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticlesRepository;

class listeArticlesController extends AbstractController
{
    /**
     * @Route("/", name="app_liste")
     */
    public function listeArticles(ArticlesRepository $articlesRepository)
    {
        $liste=$articlesRepository->findBy([],['date_ajout'=>'DESC']);
    return $this->render('listeArticles.html.twig',['articles'=>$liste]);
    }
} 