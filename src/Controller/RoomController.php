<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    #[Route('/rooms/{city}', name: 'rooms')]
    public function rooms(
        RoomRepository $rooms,
        Request $request,
        ): Response
    {
        $city = $request->get('city');
        return $this->render('room/rooms.html.twig', [
            'city' => ucfirst($city),
            'rooms' => $rooms->findByCity($city),
        ]);
    }
}
