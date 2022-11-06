<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute("app_login");
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @return Response
     * @Route("/about", name="app_about")
     */
    public function about()
    {
        return $this->render('home/about.html.twig');
    }
}
