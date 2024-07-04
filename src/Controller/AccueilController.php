<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Vehicules;
use App\Form\ContactType;
use App\Entity\Chauffeurs;
use App\Form\VehiculesType;
use App\Form\ChauffeursType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }


     /**
     * @Route("/tracking", name="tracking")
     */
    public function tracking(): Response
    {
        return $this->render('accueil/tracking.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $cont, SluggerInterface $slugger): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cont ->persist($contact);
            $cont ->flush();
            $this->addFlash('success', 'Votre bilan a été pris en compte');
        return $this->redirectToRoute('app_accueil');
               
        }
        return $this -> render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),
        ]
        );

    }

    /**
     * @Route("/vehicule", name="vehicule")
     */
    public function vehicule(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $vehicule = new Vehicules();
        $form = $this->createForm(VehiculesType::class, $vehicule);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em ->persist($vehicule);
            $em ->flush();
            $this->addFlash('success', 'Votre bilan a été pris en compte');
        return $this->redirectToRoute('vehicules');
        }          

        return $this -> render('accueil/vehicule.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),

        ]
        );
    }
    /**
     * @Route("/chauffeur", name="chauffeur")
     */
    public function chauffeur(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $chauffeur = new Chauffeurs();
        $form = $this->createForm(ChauffeursType::class, $chauffeur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em ->persist($chauffeur);
            $em ->flush();
            $this->addFlash('success', '');
        return $this->redirectToRoute('chauffeurs');
        }          

        return $this -> render('accueil/chauffeur.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),
        ]
        );
    }
}
