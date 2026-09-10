<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DemoController extends AbstractController
{
    #[Route('/hello', name: 'hello_get', methods: ["GET"])]
    public function hello_get(): Response
    {
        $wlcm_msg = "Hewo fluffs :3 !";
        return $this->render("demo/demo1.html.twig", ["param1" => $wlcm_msg]);
    }

    #[Route('/hello/{nom}', name: 'hello_get2', methods: ["GET"])]
    public function hello_get2($nom): Response
    {
        $wlcm_msg = "Hewo ". $nom ." :3 !";
        return $this->render("demo/demo1.html.twig", ["param1" => $wlcm_msg]);
    }
}
