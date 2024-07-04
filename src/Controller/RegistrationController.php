<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('_profiler');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/update/{id}", name="update", methods={"GET","POST"})
     */
    public function update(Request $request, UserRepository $repo,$id): Response
    {
        $user=$repo->find($id);
        $registrationForm = $this->createForm(RegistrationFormType::class, $user);
        $registrationForm->handleRequest($request);
        if ($registrationForm->isSubmitted() && $registrationForm->isValid())#si le formulaire est soumis et que les données sont valides on soumets
        {
            $sendDatabase=$this->getDoctrine()
                               ->getManager();
            $sendDatabase->persist($user);
            $sendDatabase->flush();                      
            $this->addFlash('notice','modification reussie!!');#message de soumission reussie avec la variable notice integré dans php
            return $this->redirectToRoute('membre');#redirection vers la page main
        }
        return $this->render('registration/update.html.twig', [
            'controller_name' => 'RegistrationController',
            'registrationForm'=> $registrationForm->createView() # il demande de creer une vue 
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Request $request, UserRepository $repo,$id): Response
    {
        $user=$repo->find($id);
        $sendDatabase=$this->getDoctrine()
                           ->getManager();
        $sendDatabase->remove($user);
        $sendDatabase->flush();                      
        $this->addFlash('notice','suppression reussie!!');
        return $this->redirectToRoute('accueil');
    }
}
