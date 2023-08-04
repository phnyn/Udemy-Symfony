<?php

namespace App\Controller;

use App\Entity\Trip;
use App\Form\CarType;
use App\Entity\Car;
use App\Repository\CarRepository;
use App\Repository\TripRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/list', name: 'app_car_list')]
    public function list(CarRepository $carRepository): Response
    {
        return $this->render('car/list.html.twig', [
            'cars' => $carRepository->findAll()
        ]);
    }

    #[Route('/add', name: 'app_car_add')]
    public function add(Request $request, CarRepository $carRepository): Response
    {
        $car = new Car();

        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $carRepository->add($car);
            return $this->redirectToRoute('app_car_list');
        }

        return $this->render('car/add.html.twig', [
                'carForm' => $form->createView(),
            ]
        );
    }

    #[Route('/update/{id}', name: 'app_car_update')]
    public function update(int $id, CarRepository $carRepository, Request $request): Response
    {
        $car =  $carRepository->find($id);

        if(!$car instanceof Car){
            dd("Auto nicht gefunden");
        }

        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $carRepository->add($car);
            return $this->redirectToRoute('app_car_list');
        }

        return $this->render('car/update.html.twig', [
                'carForm' => $form->createView(),
            ]
        );
    }

    #[Route('/delete/{id}', name: 'app_car_delete')]
    public function delete(int $id, CarRepository $carRepository, EntityManagerInterface $entityManager, TripRepository $tripRepository): Response
    {
        $car =  $carRepository->find($id);

        if(!$car instanceof Car){
            dd("Auto nicht gefunden");
        }

        //TODO if car is part of trip return error page
        // if($tripRepository->find){
        //     dd("Auto ist Teil einer Fahrt und kann deshalb nicht gelöscht werden");
        // }

        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute('app_car_list');
    }
}
