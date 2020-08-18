<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommentairesRepository;
use App\Repository\ArticlesRepository;

class ArticleController extends AbstractController
{
    /**
     * @Route("/Article/{id}", name="article")
     */
    public function listeCommentaires($id, CommentairesRepository $CommentairesRepository, ArticlesRepository $articleRepository)
    {
        $article=$articleRepository->find(['id_article'=>$id]);
        $commentaires=$CommentairesRepository->findBy(['id_article'=>$id],['date_ajout'=>'DESC']);
        return $this->render('article.html.twig', [
            'commentaires' => $commentaires, 'article'=>$article
        ]);
    }
}
