<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Editorial;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;



class EditorialController extends AbstractController
{

    //protected $manager;

    public function __construct(){
        //$this->manager = $this->getDoctrine()->getManager();
    }

    /**
     * @Route("/editoriales")
     */
    public function editoriales()
    {
        return $this->render('editoriales.html.twig', [
            'Hellow' => "Welcome!",
        ]);
    }


    /**
     * @Route("/editoriales/lista")
     * @return JsonResponse
     */
    public function listaEditoriales()
    {
        $response = new JsonResponse();
        $serializer = $this->container->get('serializer');
        $editoriales = $serializer->serialize($this->getDoctrine()->getRepository(Editorial::class)->findAll(), 'json');

        $response->setData(
            $editoriales
        );

        return $response;
    }

    /**
     * @Route("/editoriales/crear", methods={"POST"})
     * @return JsonResponse
     */
    public function crearEditoriales(Request $request)
    {


        $data = json_decode($request->getContent(), true);;

        $editorial = new Editorial();
        $editorial->setNombre($data['nombre']);
        $editorial->setSede($data['sede']);

        $this->getDoctrine()->getRepository(Editorial::class)->save($editorial);

        $response = new JsonResponse();

        $response->setData(
            ['success' => true, 'message' => 'Editorial creada correctamente']
        );

        return $response;
    }

}