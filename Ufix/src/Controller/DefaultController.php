<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\NewUserType;

use App\Form\Type\NewAdType;
use App\Form\Type\ModifyUserType;
use App\Entity\User;
// use App\Entity\Product;
use App\Entity\Ad;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\Type\ContactType;
use App\Entity\Contact;
use App\Notification\ContactNotification;

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
                        //    dump($data);
                        //    die;
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
        //throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
        return $this->redirectToRoute('home_page');
    }

    /**
     * @Route("/annonces", name="annonces")
     */
    public function showConnectedHomePage()
    {

        $repository = $this->getDoctrine()->getRepository(Ad::class);
        $ads = $repository->findAll();


        return $this->render('home_connected.html.twig', [
            'ads' => $ads
        ]);
    }

    /**
     * @Route("/newad", name="new_ad")
     */
    public function newAd(Request $request, Security $security)
    {
        $user = $security->getUser();
        // dump($security->getUser());
        // die;
        $newAdForm = $this->createForm(NewAdType::class);
        $newAdForm->handleRequest($request);
        
        if ($newAdForm->isSubmitted() && $newAdForm->isValid()) {
            // dump("ouais");
            // die;
            $em = $this->getDoctrine()->getManager();
            $data = $newAdForm->getData();
            $newAd = new Ad();
                        //    dump($data['category']);
                        //    die;
            
            $newAd->setProductCategory($data['category']);
            $newAd->setProductName($data['name']);
            $newAd->setProductBreakDescription($data['breakState']);
            $newAd->setProductPrice($data['price']);
            $newAd->setAdDescription($data['description']);
            $newAd->setAdType($data['purpose']);
            $newAd->setOwner($user);

            $user->addOwnedAd($newAd);

            $em->persist($user);
            $em->persist($newAd);
            $em->flush();


            return $this->redirectToRoute('new_ad');
        } 

      
        return $this->render('new_ad.html.twig', [
            'newAdForm' => $newAdForm->createView(),


        ]);
    }

    /**
     * @Route("/profil", name="profil_page")
     */
    public function showProfilPage(Request $request, Security $security)
    {
        $user = $security->getUser();
        // dump($user->getFirstName());
        // die;

        $modifyUserForm = $this->createForm(ModifyUserType::class, $user);
        $modifyUserForm->handleRequest($request);

        if ($modifyUserForm->isSubmitted() && $modifyUserForm->isValid()) {
            // dump("ouais");
            // die;
            $em = $this->getDoctrine()->getManager();
            $data = $modifyUserForm->getData();
            $modifiedUser = $security->getUser();
                        //    dump($data);
                        //    die;
            $modifiedUser->setFirstName($data->getFirstName());
            $modifiedUser->setLastName($data->getLastName());
            $modifiedUser->setAdress($data->getAdress());
            $modifiedUser->setPostCode($data->getPostCode());
            $modifiedUser->setCountry($data->getCountry());
            $modifiedUser->setCity($data->getCity());
            

            
            $em->persist($modifiedUser);
            $em->flush();


            return $this->redirectToRoute('profil_page');
        } 


        return $this->render('profil.html.twig', [
            'user' => $user,
            'modifyUserForm' => $modifyUserForm->createView()
        ]);
    }

    /**
     * @Route("/repair/{id}", name="to_repair", defaults={"id": 1})
     */
    public function showRepairPage(Ad $ad)
    {
        return $this->render('toRepair.html.twig', [
            'ad' => $ad
        ]);
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
     * @Route("repairer/contact/toRepair", name="contact_repair")
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
     * @Route("/contact", name="contact")
     */
    public function showContact( Request $request, ContactNotification $notification): Response
    {
        $contact = new Contact();
        $form = $this->createForm( ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $notification->notify($contact);

            $this->addFlash('success', 'Email sent');
            return $this->redirectToRoute('home_page');
        }

        return $this->render('contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/mentions_legales", name="legal_mentions")
     */
    public function showLegalMentions()
    {
        return $this->render('legal_mentions.html.twig');
    }
}
