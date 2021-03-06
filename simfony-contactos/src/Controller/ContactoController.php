<?php

namespace App\Controller;

use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoController extends AbstractController
{
    private $contactos = [

        1 => ["nombre" => "Juan Pérez", "telefono" => "524142432", "email" => "juanp@ieselcaminas.org"],

        2 => ["nombre" => "Ana López", "telefono" => "58958448", "email" => "anita@ieselcaminas.org"],

        5 => ["nombre" => "Mario Montero", "telefono" => "5326824", "email" => "mario.mont@ieselcaminas.org"],

        7 => ["nombre" => "Laura Martínez", "telefono" => "42898966", "email" => "lm2000@ieselcaminas.org"],

        9 => ["nombre" => "Nora Jover", "telefono" => "54565859", "email" => "norajover@ieselcaminas.org"]

    ];  

 /**
     * @Route("/contacto/{codigo}", name="ficha_contacto)
     */
    
    public function ficha($codigo): Response{
        $resultado = ($this->contactos[$codigo] ?? null);

        if($resultado){
            return $this->render('ficha_contacto.html.twig', [
                'contacto' => $resultado
            ]);
        }
    }

    /**
     * @Route("/contacto/buscar/{texto}", name="buscar_contacto")
     */

    public function buscar($texto): Response{
        $resultados = array_filter($this->contactos,
        function ($contacto) use ($texto){
            return strpos($contacto["nombre"],$texto) !== FALSE;
        }
    );
    return $this->render('lista_contactos.html.twig', [
        'contactos' => $resultados
    ]);
}

}
    

   


