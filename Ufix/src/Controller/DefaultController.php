<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\NewUserType;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;





/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function showHomePage(AuthenticationUtils $authenticationUtils, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // dump($request);
        // die;
        $this->passwordEncoder = $passwordEncoder;
        
        $newUserForm = $this->createForm(NewUserType::class);
        $newUserForm->handleRequest($request);
        
        if ($newUserForm->isSubmitted() && $newUserForm->isValid()) {
            // dump("ouais");
            // die;
            $em = $this->getDoctrine()->getManager();
            $data = $newUserForm->getData();
            $newUser = new User();
                           dump($data);
                           die;
            $newUser->setFirstName($data['firstName']);
            $newUser->setLastName($data['lastName']);
            $newUser->setEmail($data['email']);
            $newUser->setPassword($this->passwordEncoder->encodePassword($newUser, $data['password']));
            $newUser->setRoles(['ROLE_CLASSIC']);
            $newUser->setAdress($data['adress']);
            $newUser->setPostCode($data['postCode']);
            $newUser->setCountry($data['country']);
            $newUser->setCity($data['city']);
            
            $em->persist($newUser);
            $em->flush();


            return $this->redirectToRoute('new_ad');
        } 


        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('home.html.twig', [
        'last_username' => $lastUsername, 
        'error' => $error,
        'newUserForm' => $newUserForm->createView(),
        
        ]);
        // return $this->render('home.html.twig');
    }

    

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

    /**
     * @Route("/admin/home", name="home_connected")
     */
    public function showConnectedHomePage()
    {
        return $this->render('home_connected.html.twig');
    }

    /**
     * @Route("/newad", name="new_ad")
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
     * @Route("/repair", name="to_repair")
     */
    public function showRepairPage()
    {
        return $this->render('toRepair.html.twig');
    }

    /**
     * @Route("/sell", name="to_sell")
     */
    public function showSellPage()
    {
        return $this->render('toSell.html.twig');
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
     * @Route("/contact/toRepair", name="contact_repair")
     */
    public function showContactRepair()
    {
        return $this->render('contactToRepair.html.twig');
    }

    /**
     * @Route("/contact/seller/buy", name="contact_seller_without_repair")
     */
    public function showContactSellerBuy()
    {
        return $this->render('contactSellerBuy.html.twig');
    }

    /** 
     * @Route("/contact/seller/repair", name="contact_seller_with_repair")
     */
    public function showContactSellerWithRepair()
    {
        return $this->render('contactSellerRepair.html.twig');
    }

    /** 
     * @Route("/contact/seller/repair-2", name="contact_seller_with_repair2")
     */
    public function showContactSellerWithRepair2()
    {
        return $this->render('contactSellerRepair2.html.twig');
    }


    /** 
     * @Route("/messaging", name="messaging")
     */
    public function showMessaging()
    {
        return $this->render('messaging.html.twig');
    }

    /** 
     * @Route("/edit-product", name="edit_product")
     */
    public function showEditProduct()
    {
        return $this->render('edit_product.html.twig');
    }

    /** 
     * @Route("/cgu", name="cgu")
     */
    public function showCGU()
    {
        return $this->render('cgu.html.twig');
    }
    /**
     * @Route("/contacter", name="contact")
     */
    public function showContact()
    {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/mentions_legales", name="legal_mentions")
     */
    public function showLegalMentions()
    {
        return $this->render('legal_mentions.html.twig');
    }
}
