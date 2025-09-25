<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



final class PageController extends AbstractController
{
    //_----------------------------------------------
    #[Route('/page', name: 'app_page')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PageController.php',
        ]);
    }
    //--------------------------------------metodo inicio con estilo
     #[Route('/',name:'inicio')]
    public function inicio(): Response
    {
        return $this->render('inicio.html.twig');
    }





}

