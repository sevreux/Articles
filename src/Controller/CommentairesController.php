<?php

namespace App\Controller;
use App\Form\CommentaireFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CommentairesRepository;
use App\Entity\Commentaires;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class CommentairesController extends AbstractController
{
    /**
     * @Route("/{titreArticle}/{id}/Commentaires", name="commentaires")
     */
    public function newCommentaire(EntityManagerInterface $em,CommentairesRepository $commentaireRepo,Request $request, $id,$titreArticle)
    {
        $form=$this->createForm(CommentaireFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $date=new \DateTime();
            $data=$form->getData();
            $commentaire=new Commentaires();
            $commentaire->setPseudo($data['pseudo']);
            $commentaire->setMessage($data['message']);
            $commentaire->setDateAjout($date);
            $commentaire->setIdArticle($id);
            $em->persist($commentaire);
            $em->flush();
            return $this->redirectToRoute('article',['id'=>$id]);
        }
        return $this->render('CreationCommentaire.html.twig', [
            'commentaireForm' => $form->createView(),'titreArticle'=> $titreArticle
        ]);
    }
}
