<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Stripe\StripeClient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authenticator\Token\PostAuthenticationToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[Route('/payment')]
class PaymentController extends AbstractController
{
    private const PAYMENT_STATUS_PAID = 'paid';

    #[Route('/', name: 'app_payment')]
    public function payment(): Response
    {
        $stripeClient = new StripeClient($this->getParameter('stripe_secret_key'));

        $checkoutSession = $stripeClient->checkout->sessions->create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'Abonnement Premium',
                ],
                'unit_amount' => 1000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => $this->getUser()->getEmail(),
            'success_url' => $this->getParameter('root_url') . "payment/success-url?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => $this->generateUrl('cancel_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
          ]);

        return $this->redirect($checkoutSession->url, 303);
    }

    #[Route('/success-url', name: 'success_url')]
    public function successUrl(
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        TokenStorageInterface $tokenStorage
    ): Response {
        $stripeClient = new StripeClient($this->getParameter('stripe_secret_key'));

        try {
            $session = $stripeClient->checkout->sessions->retrieve($_GET['session_id']);

            if ($session["payment_status"] === self::PAYMENT_STATUS_PAID) {
                $user = $this->getUser();
                $user->setRoles(['ROLE_PREMIUM']);
                $entityManager->persist($user);
                $entityManager->flush();
            }
        } catch (\Error $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }

        $databaseUser = $userRepository->findOneById($this->getUser()->getId());
        $databaseUserRoles = $databaseUser->getRoles();
        $newToken = new PostAuthenticationToken($databaseUser, 'main', $databaseUserRoles);
        $tokenStorage->setToken($newToken);

        $this->addFlash('notice', 'Votre paiement a bien été accepté, Merci !');
        return $this->redirectToRoute('home');
    }

    #[Route('/cancel-url', name: 'cancel_url')]
    public function cancelUrl(): Response
    {
        $this->addFlash('warning', 'Erreur : votre paiement a été refusé');
        return $this->redirectToRoute('home');
    }
}
