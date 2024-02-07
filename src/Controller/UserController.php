<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserEditType;
use App\Form\SubscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        EventDispatcherInterface $dispatcher,
        TokenStorageInterface $tokenStorage
    ): Response {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));
            $user->setRoles(['ROLE_USER']);
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('notice', 'Compte créé avec succès ! Bienvenue');

            $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
            $tokenStorage->setToken($token);
            $event = new InteractiveLoginEvent($request, $token);
            $dispatcher->dispatch($event, SecurityEvents::INTERACTIVE_LOGIN);

            return $this->redirectToRoute('home');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/{id}/subscribe', name: 'app_subscribe', methods: ['GET', 'POST'])]
    public function getPremium(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SubscriptionType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_payment', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/subscription.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()->getId() !== $id) {
            $this->addFlash('warning', 'Erreur : vous ne pouvez pas modifier un profil différent du vôtre');
            return $this->redirectToRoute('home');
        }
        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('notice', 'Vos modifications ont bien été prises en compte');
            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_user_delete', methods: ['GET', 'POST'])]
    public function delete(
        int $id,
        User $user,
        EntityManagerInterface $entityManager,
        Request $request,
    ): Response {

        if ($this->getUser()->getId() !== $id) {
            $this->addFlash('warning', 'erreur : vous ne pouvez pas supprimer un profil différent du vôtre');
            return $this->redirectToRoute('home');
        }
        $entityManager->remove($user);
        $entityManager->flush();
        $request->getSession()->invalidate();
        $this->container->get('security.token_storage')->setToken(null);

        return $this->redirectToRoute('home');
    }
}
