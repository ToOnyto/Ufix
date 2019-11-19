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
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/newad", name="new_ad")
     */
    public function newAd()
    {
        return $this->render('new_ad.html.twig');
    }

        /**
     * @Route("/temp", name="temp")
     */
    public function temp()
    {
        return $this->render('TO_DELETE.html.twig');
    }

    /**
     * @Route("/profil", name="profil_page")
     */
    public function showProfilPage()
    {
        return $this->render('profil.html.twig');
    }
}
