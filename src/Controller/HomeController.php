<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\Itineraire;

final class HomeController extends AbstractController
{
    /**
 * Page d'accueil
 *
 * @return Response
 */

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/create-itineraire', name: 'create_itineraire')]
public function createItineraire(DocumentManager $dm): Response
{
    $itineraire = new Itineraire();
    $itineraire->setDepart('Paris')
               ->setArrive('Lyon')
               ->setJour(new \DateTime('2025-03-10'));

    $dm->persist($itineraire);
    $dm->flush();

    return new Response('Itinéraire créé avec ID : ' . $itineraire->getId());
}
}
