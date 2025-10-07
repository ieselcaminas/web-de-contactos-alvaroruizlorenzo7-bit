<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Contacto;

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



#[Route('/contacto/insertar', name: 'insertar_contacto')]
public function insertar(ManagerRegistry $doctrine)
{
    $entityManager = $doctrine->getManager();
    foreach($this->contactos as $c){
        $contacto = new Contacto();
        $contacto->setNombre($c["nombre"]);
        $contacto->setTelefono($c["telefono"]);
        $contacto->setEmail($c["email"]);
        $entityManager->persist($contacto);
    }try {
        // Sólo se necesita realizar flush una vez y confirmará todas las operaciones pendientes
        $entityManager->flush();
        return new Response("Contactos insertados");
    } catch (\Exception $e) {
        return new Response("Error insertando objetos");
    }
}


//----------------------------------------------------------------


#[Route('/contacto/{codigo}', name: 'ficha_contacto')]

public function ficha($codigo): Response{

    //Si no existe el elemento con dicha clave devolvemos null

    $resultado = ($this->contactos[$codigo] ?? null);



    return $this->render('ficha_contacto.html.twig', [

    'contacto' => $resultado

    ]);

}








}

