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
    #[Route('/payment', name: 'app_payment')]
    public function payment(): Response
    {
        $stripe = new StripeClient($this->getParameter('stripe_secret_key'));

        $checkoutSession = $stripe->checkout->sessions->create([
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
            'success_url' => "http://localhost:8000/payment/success-url?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => $this->generateUrl('cancel_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
          ]);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkoutSession->url);

        return $this->redirect($checkoutSession->url, 303);
    }

    #[Route('/success-url', name: 'success_url')]
    public function successUrl(EntityManagerInterface $entityManager): Response
    {
        $stripe = new StripeClient($this->getParameter('stripe_secret_key'));

        try {
            $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);

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
