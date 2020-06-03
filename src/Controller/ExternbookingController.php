<?php

namespace App\Controller;

use App\Entity\Externbooking;
use App\Form\ExternbookingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/externbooking")
 */
class ExternbookingController extends AbstractController
{
    /**
     * @Route("/", name="externbooking_index", methods={"GET"})
     */
    public function index(): Response
    {
        $externbookings = $this->getDoctrine()
            ->getRepository(Externbooking::class)
            ->findAll();

        return $this->render('externbooking/index.html.twig', [
            'externbookings' => $externbookings,
        ]);
    }

    /**
     * @Route("/new", name="externbooking_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $externbooking = new Externbooking();
        $form = $this->createForm(ExternbookingType::class, $externbooking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($externbooking);
            $entityManager->flush();

            return $this->redirectToRoute('externbooking_index');
        }

        return $this->render('externbooking/new.html.twig', [
            'externbooking' => $externbooking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="externbooking_show", methods={"GET"})
     */
    public function show(Externbooking $externbooking): Response
    {
        return $this->render('externbooking/show.html.twig', [
            'externbooking' => $externbooking,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="externbooking_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Externbooking $externbooking): Response
    {
        $form = $this->createForm(ExternbookingType::class, $externbooking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('externbooking_index', [
                'id' => $externbooking->getId(),
            ]);
        }

        return $this->render('externbooking/edit.html.twig', [
            'externbooking' => $externbooking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="externbooking_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Externbooking $externbooking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$externbooking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($externbooking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('externbooking_index');
    }
}
