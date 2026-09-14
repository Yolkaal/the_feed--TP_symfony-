<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Publication;
use App\Repository\PublicationRepository;
use App\Form\PublierType;
use Doctrine\ORM\EntityManagerInterface;


final class PublicationController extends AbstractController
{
    #[Route('/', name: 'feed', methods: ["GET", "POST"])]
    public function feed(PublicationRepository $publicationRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $publication = new Publication();
        $form = $this->createForm(PublierType::class, $publication, ['method' => 'POST'], ['action' => $this->generateUrl('feed')]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $publication->prePersistDatePublication();
            $entityManager->persist($publication);
            $entityManager->flush();
            $successMsg = 'Publication enregistrée avec succès';
            return $this->redirectToRoute('feed');
        }

        $publications = $publicationRepository->findAllOrderedByDate();

        return $this->render('publication/feed.html.twig', ['publications' => $publications, 'form' => $form,]);
    }
}
