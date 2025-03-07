<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\Itineraire;
use App\Form\ItineraireType;


final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, DocumentManager $dm): Response
    {
        // Créer un nouvel itinéraire
        $itineraire = new Itineraire();
        $form = $this->createForm(ItineraireType::class, $itineraire);

        // Gérer la requête du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dm->persist($itineraire);
            $dm->flush();

            // Redirection après soumission
            return $this->redirectToRoute('app_home'); 
        }

        // Rendre la vue avec le formulaire
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
