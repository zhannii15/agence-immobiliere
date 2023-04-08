<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    #[Route('/property', name: 'app_property')]
    public function index(PropertyRepository $propertyRepo): Response
    {
        $propertie=$propertyRepo->findAll();

        return $this->render('property/index.html.twig', [
            'propertie'=> $propertie ,
            'current_menu' => 'property',
        ]);
    }

    #[Route('/property/{id}',name:'property_single', methods: ['GET'])]
    public function showProperty(Property $property): Response
    {
        return $this->render('property/ShowPropertySingle.html.twig', [
            'prop'=>$property,
            // 'mode'=>$property->getId()!=null,
        ]);
    }

}
