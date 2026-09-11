<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Publication;

final class PublicationController extends AbstractController
{
    #[Route('/', name: 'feed', methods: ["GET"])]
    public function feed(): Response
    {
        $publication1 = new Publication();
        $publication1->setMessage("hewooo");
        $publication1->setDatePublication(new \DateTime());
        $publication2 = new Publication();
        $publication2->setMessage("boop");
        $publication2->setDatePublication(new \DateTime());
        $publication3 = new Publication();
        $publication3->setMessage("blep");
        $publication3->setDatePublication(new \DateTime());
        $publications = [$publication1, $publication2, $publication3];

        return $this->render('publication/feed.html.twig', ['publications' => $publications]);
    }
}
