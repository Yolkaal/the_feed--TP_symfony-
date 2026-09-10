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
        return $this->render("demo/demo1.html.twig");
    }

    #[Route('/hello/{nom}', name: 'hello_get2', methods: ["GET"])]
    public function hello_get2($nom): Response
    {
        $wlcm_msg = "Hewo ". $nom ." :3 !";
        return $this->render("demo/demo2.html.twig", ["param1" => $wlcm_msg]);
    }

    #[Route('/liste/{nom}', name: 'courses', methods: ["GET"])]
    public function courses($nom): Response
    {
        $wlcm_msg = "course liste for ". $nom ." :3 !";
        $courses = ["rx7900xtx", "r9 9950X3D", "lenovo OLED 180hz", "X870 elite Aorus", "Reinhardt minifig"];
        return $this->render("demo/demo3.html.twig", ["param1" => $wlcm_msg, "courses" => $courses]);
    }
}
