<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Editorial;
use App\Entity\Libro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;



class LibroController extends AbstractController
{

    //protected $manager;

    public function __construct(){
        //$this->manager = $this->getDoctrine()->getManager();
    }

    /**
     * @Route("/libros")
     */
    public function libros()
    {
        return $this->render('libros.html.twig', [
            'Hellow' => "Welcome!",
        ]);
    }


    /**
     * @Route("/libros/lista")
     * @return JsonResponse
     */
    public function listaLibros()
    {
        $response = new JsonResponse();
        $serializer = $this->container->get('serializer');
        $libros = $serializer->serialize($this->getDoctrine()->getRepository(Libro::class)->findAll(), 'json');

        $response->setData(
            $libros
        );

        return $response;
    }

    /**
     * @Route("/libros/crear", methods={"POST"})
     * @return JsonResponse
     */
    public function crearLibros(Request $request)
    {

        $data = json_decode($request->getContent(), true);;

        $libro = new Libro();
        $libro->setIsbn($data['isbn']);
        $libro->setNPaginas($data['n_paginas']);
        $libro->setSinopsis($data['sinopsis']);
        $libro->setTitulo($data['titulo']);
        $libro->setEditorial($this->getDoctrine()->getRepository(Editorial::class)->find($data['editorial']));


        $this->getDoctrine()->getRepository(Libro::class)->save($libro);

        $response = new JsonResponse();

        $response->setData(
            ['success' => true, 'message' => 'Libro creado correctamente']
        );

        return $response;
    }

}