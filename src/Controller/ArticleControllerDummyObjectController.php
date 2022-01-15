<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\Persistence\ManagerRegistry;

class ArticleControllerDummyObjectController extends AbstractController
{
    #[Route('/articledummy', name: 'Dummy Article')]

    public function createDummyArticle(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $article = new Article();
        $article->setTitle('Mon premier projet Symfony');
        $article->setNbLike(9999);
        $article->setContent('I LOVE SYMFONY');
        $article->setCreatedAt(new \DateTimeImmutable());
        $article->setUpdatedAt(new \DateTimeImmutable());
        $entityManager->persist($article);
        $entityManager->flush();

        return new Response("Nouvelle article ajouté sous l'id : " . $article->getId());
    }
}
