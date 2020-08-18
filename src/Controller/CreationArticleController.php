<?php

namespace App\Controller;
use App\Form\ArticleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticlesRepository;
use App\Entity\Articles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class CreationArticleController extends AbstractController
{
    /**
     * @Route("/NewArticle", name="new_article")
     */
    public function newArticle(EntityManagerInterface $em,ArticlesRepository $articleRepo,Request $request)
    {
        $form=$this->createForm(ArticleFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $date=new \DateTime();
            $data=$form->getData();
            $article=new Articles();
            $article->setTitre($data['titre']);
            $article->setDescription($data['description']);
            $article->setDateAjout($date);
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('app_liste');
        }
        
        return $this->render('CreateArticle.html.twig', [
            'articleForm' => $form->createView(),
        ]);
    }
}
