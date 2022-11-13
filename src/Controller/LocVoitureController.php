<?php

namespace App\Controller;

use App\Entity\LocVoiture;
use App\Form\LocVoitureType;
use App\Repository\LocVoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/loc/voiture")
 */
class LocVoitureController extends AbstractController
{
    /**
     * @Route("/", name="app_loc_voiture_index", methods={"GET"})
     */
    public function index(LocVoitureRepository $locVoitureRepository): Response
    {
        return $this->render('loc_voiture/index.html.twig', [
            'loc_voitures' => $locVoitureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_loc_voiture_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LocVoitureRepository $locVoitureRepository): Response
    {
        $locVoiture = new LocVoiture();
        $form = $this->createForm(LocVoitureType::class, $locVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locVoitureRepository->add($locVoiture, true);

            return $this->redirectToRoute('app_loc_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loc_voiture/new.html.twig', [
            'loc_voiture' => $locVoiture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_loc_voiture_show", methods={"GET"})
     */
    public function show(LocVoiture $locVoiture): Response
    {
        return $this->render('loc_voiture/show.html.twig', [
            'loc_voiture' => $locVoiture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_loc_voiture_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, LocVoiture $locVoiture, LocVoitureRepository $locVoitureRepository): Response
    {
        $form = $this->createForm(LocVoitureType::class, $locVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locVoitureRepository->add($locVoiture, true);

            return $this->redirectToRoute('app_loc_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loc_voiture/edit.html.twig', [
            'loc_voiture' => $locVoiture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_loc_voiture_delete", methods={"POST"})
     */
    public function delete(Request $request, LocVoiture $locVoiture, LocVoitureRepository $locVoitureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$locVoiture->getId(), $request->request->get('_token'))) {
            $locVoitureRepository->remove($locVoiture, true);
        }

        return $this->redirectToRoute('app_loc_voiture_index', [], Response::HTTP_SEE_OTHER);
    }
}
