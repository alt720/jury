<?php

namespace App\Controller\Custom;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActuController extends AbstractController
{
    #[Route('/actu', name: 'app_actu')]
    public function index(): Response
    {
        return $this->render('custom/actu/index.html.twig');
    }
}
