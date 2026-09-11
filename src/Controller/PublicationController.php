<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Publication;
use App\Repository\PublicationRepository;


final class PublicationController extends AbstractController
{
    #[Route('/', name: 'feed', methods: ["GET"])]
    public function feed(PublicationRepository $publicationRepository): Response
    {
        $publications = $publicationRepository->findAllOrderedByDate();

        return $this->render('publication/feed.html.twig', ['publications' => $publications]);
    }
}
