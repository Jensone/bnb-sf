<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'paris')]
    public function paris(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'paris',
            'subtitle' => 'paris',
            'background' => 'css/paris.css'
        ]);
    }
    #[Route('/las-vegas', name: 'lasvegas')]
    public function lasvegas(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'las vegas',
            'subtitle' => 'las vegas',
            'background' => 'css/lasvegas.css'

        ]);
    }
    #[Route('/kyoto', name: 'kyoto')]
    public function kyoto(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'kyoto',
            'subtitle' => '京都市',
            'background' => 'css/kyoto.css'

        ]);
    }
    #[Route('/sydney', name: 'sydney')]
    public function sydney(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'sydney',
            'subtitle' => 'sydney',
            'background' => 'css/sydney.css'

        ]);
    }
    #[Route('/hong-kong', name: 'hongkong')]
    public function hongkong(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'hong kong',
            'subtitle' => '香港',
            'background' => 'css/hongkong.css'

        ]);
    }
}