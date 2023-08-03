<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/list', name: 'app_car_list')]
    public function list(): Response
    {
        return $this->render('car/list.html.twig');
    }

    #[Route('/add', name: 'app_car_add')]
    public function add(): Response
    {
        return $this->render('car/add.html.twig');
    }
}
