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
        return $this->render('page/paris.html.twig', [
        ]);
    }
    #[Route('/las-vegas', name: 'lasvegas')]
    public function lasvegas(): Response
    {
        return $this->render('page/paris.html.twig', [
        ]);
    }
    #[Route('/kyoto', name: 'kyoto')]
    public function kyoto(): Response
    {
        return $this->render('page/paris.html.twig', [
        ]);
    }
    #[Route('/sydney', name: 'sydney')]
    public function sydney(): Response
    {
        return $this->render('page/paris.html.twig', [
        ]);
    }
    #[Route('/hong-kong', name: 'hongkong')]
    public function hongkong(): Response
    {
        return $this->render('page/paris.html.twig', [
        ]);
    }
}
