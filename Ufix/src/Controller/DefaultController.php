<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/home")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function showHomePage()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/profil", name="profil_page")
     */
    public function showProfilPage()
    {
        return $this->render('profil.html.twig');
    }
}
