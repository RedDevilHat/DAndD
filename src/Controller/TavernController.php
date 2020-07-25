<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TavernController extends AbstractController
{
    /**
     * @Route("/tavern", name="tavern")
     */
    public function index()
    {
        return $this->render('tavern/index.html.twig', [
            'controller_name' => 'TavernController',
        ]);
    }
}
