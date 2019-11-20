<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/")
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
     * @Route("/new-ad", name="new_ad")
     */
    public function newAd()
    {
        return $this->render('new_ad.html.twig');
    }

    /**
     * @Route("/profil", name="profil_page")
     */
    public function showProfilPage()
    {
        return $this->render('profil.html.twig');
    }

    /**
     * @Route("/ad", name="ad")
     */
    public function showAdPage()
    {
        return $this->render('ad.html.twig');
    }
    
    /** 
     * @Route("/adsSaved", name="ads_saved")
     */
    public function showAdsSaved()
    {
        return $this->render('ads_saved.html.twig');
    }

    /** 
     * @Route("/selectRepairer", name="select_repairer")
     */
    public function showSelectRepairer()
    {
        return $this->render('select_repairer.html.twig');
    }

    /**
    * @Route("/contact-seller-without-repair", name="contact_seller_without_repair")
    */
    public function showContactSellerWithoutRepair ()
    {
        return $this->render('contact_seller_without_repair.html.twig');
    }

    /** 
     * @Route("/contact-seller-with-repair", name="contact_seller_with_repair")
     */
    public function showContactSellerWithRepair ()
    {
        return $this->render('contact_seller_with_repair.html.twig');
    }

    /** 
     * @Route("/contact-seller-with-repair-2", name="contact_seller_with_repair2")
     */
    public function showContactSellerWithRepair2 ()
    {
        return $this->render('contact_seller_with_repair_2.html.twig');
    }

}
