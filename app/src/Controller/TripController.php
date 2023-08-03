<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/trip')]
class TripController extends AbstractController
{
    #[Route('/list', name: 'app_trip_list')]
    public function list(): Response
    {
        return $this->render('trip/list.html.twig');
    }

    #[Route('/add', name: 'app_trip_add')]
    public function add(): Response
    {
        return $this->render('trip/add.html.twig');
    }
}
