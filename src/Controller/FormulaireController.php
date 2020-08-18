<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommentairesRepository;
use App\Repository\ArticlesRepository;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/Formulaire", name="formulaire")
     */
    public function creationCommentaire()
    {
        return $this->render('formulaire.html.twig');
    }
}