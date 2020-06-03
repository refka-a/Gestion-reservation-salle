<?php

namespace App\Controller;

use App\Entity\Pricing;
use App\Form\PricingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/pricing")
 */
class PricingController extends AbstractController
{
    /**
     * @Route("/", name="pricing_index", methods={"GET"})
     */
    public function index(): Response
    {
        $pricings = $this->getDoctrine()
            ->getRepository(Pricing::class)
            ->findAll();

        return $this->render('pricing/index.html.twig', [
            'pricings' => $pricings,
        ]);
    }

    /**
     * @Route("/new", name="pricing_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pricing = new Pricing();
        $form = $this->createForm(PricingType::class, $pricing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pricing);
            $entityManager->flush();

            return $this->redirectToRoute('pricing_index');
        }

        return $this->render('pricing/new.html.twig', [
            'pricing' => $pricing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pricing_show", methods={"GET"})
     */
    public function show(Pricing $pricing): Response
    {
        return $this->render('pricing/show.html.twig', [
            'pricing' => $pricing,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pricing_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pricing $pricing): Response
    {
        $form = $this->createForm(PricingType::class, $pricing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pricing_index', [
                'id' => $pricing->getId(),
            ]);
        }

        return $this->render('pricing/edit.html.twig', [
            'pricing' => $pricing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pricing_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pricing $pricing): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pricing->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pricing);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pricing_index');
    }
}
