<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Knp\Component\Pager\PaginatorInterface;
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
        PaginatorInterface $paginator
        ): Response
    {
        $city = $request->get('city');
        $paginate = $paginator->paginate(
            $rooms->findByCity($city),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('room/rooms.html.twig', [
            'city' => ucfirst($city),
            'rooms' => $paginate
        ]);
    }
}
