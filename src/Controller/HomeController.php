<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PropertyRepository $propertyRepo): Response
    {
        $propertie=$propertyRepo->findAll();

        return $this->render('home/index.html.twig', [
            'propertie'=> $propertie,
            'current_menu' => 'home',
            
        ]);
    }
}
