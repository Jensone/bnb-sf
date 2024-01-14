<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    // Home page
    #[Route('/', name: 'paris', methods: ['GET'])]
    public function paris(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'paris',
            'subtitle' => 'paris',
            'background' => 'paris'
        ]);
    }

    // Las Vegas page
    #[Route('/las-vegas', name: 'lasvegas', methods: ['GET'])]
    public function lasvegas(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'las vegas',
            'subtitle' => 'las vegas',
            'background' => 'lasvegas'

        ]);
    }

    // Kyoto page
    #[Route('/kyoto', name: 'kyoto', methods: ['GET'])]
    public function kyoto(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'kyoto',
            'subtitle' => '京都市',
            'background' => 'kyoto'

        ]);
    }

    // Sydney page
    #[Route('/sydney', name: 'sydney', methods: ['GET'])]
    public function sydney(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'sydney',
            'subtitle' => 'sydney',
            'background' => 'sydney'

        ]);
    }

    // Hong Kong page
    #[Route('/hong-kong', name: 'hongkong', methods: ['GET'])]
    public function hongkong(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'hong kong',
            'subtitle' => '香港',
            'background' => 'hongkong'

        ]);
    }

    // Account page
    #[Route('/account', name: 'account', methods: ['GET', 'POST'])]
    public function account(
        RoomRepository $roomRepository,
    ): Response
    {
        return $this->render('page/account.html.twig', [
            'title' => 'Mon compte',

        ]);
    }
}
