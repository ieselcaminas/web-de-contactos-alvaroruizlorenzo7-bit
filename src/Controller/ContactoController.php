<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

final class ContactoController extends AbstractController
{
//----------------------------------------------------------------------base datos

    private $contactos = [
        1 => ["nombre" => "Juan Pérez", "telefono" => "524142432", "email" => "juanp@ieselcaminas.org"],
        2 => ["nombre" => "Ana López", "telefono" => "58958448", "email" => "anita@ieselcaminas.org"],
        5 => ["nombre" => "Mario Montero", "telefono" => "5326824", "email" => "mario.mont@ieselcaminas.org"],
        7 => ["nombre" => "Laura Martínez", "telefono" => "42898966", "email" => "lm2000@ieselcaminas.org"],
        9 => ["nombre" => "Nora Jover", "telefono" => "54565859", "email" => "norajover@ieselcaminas.org"]
    ];     


//----------------------------------------------------------------metodo ver contacto


//----------------------------------------------------------------
 #[Route('/contacto/{codigo?1}', name: 'ficha_contacto')]
    public function ficha($codigo): Response {
       $contacto = ($this->contactos[$codigo]??null);

       if($contacto){

               return $this->render('ficha_contacto.html.twig',["contacto" => $contacto ]);

       }
       return new Response("<html><body>Contacto $codigo no encontrado</body>");
}
}