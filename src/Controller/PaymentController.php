<?php

namespace App\Controller;

use App\Entity\User;
use Stripe\StripeClient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/payment')]

class PaymentController extends AbstractController
{
    private StripeClient $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient($this->getParameter('stripe_secret_key'));
    }

    #[Route('/payment', name: 'app_payment')]
    public function payment(): Response
    {
        $checkoutSession = $this->stripe->checkout->sessions->create([
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

        header("Location: " . $checkoutSession->url);

        return $this->redirect($checkoutSession->url, 303);
    }

    #[Route('/success-url', name: 'success_url')]
    public function successUrl(EntityManagerInterface $entityManager): Response
    {
        try {
            $session = $this->stripe->checkout->sessions->retrieve($_GET['session_id']);

            if ($session["payment_status"] === "paid") {
                $user = $this->getUser();
                $user->setRoles(['ROLE_PREMIUM']);
                $entityManager->persist($user);
                $entityManager->flush();
            }
            http_response_code(200);
        } catch (\Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }

        return $this->render('/user/payment/success.html.twig');
    }


    #[Route('/cancel-url', name: 'cancel_url')]
    public function cancelUrl(): Response
    {
        return $this->render('/user/payment/cancel.html.twig', []);
    }
}
