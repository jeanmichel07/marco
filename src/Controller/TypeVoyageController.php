<?php

namespace App\Controller;

use App\Entity\TypeVoyage;
use App\Form\TypeVoyageType;
use App\Repository\TypeVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/type-voyage")
 */
class TypeVoyageController extends AbstractController
{
    /**
     * @Route("/", name="app_type_voyage_index", methods={"GET"})
     */
    public function index(TypeVoyageRepository $typeVoyageRepository): Response
    {
        return $this->render('type_voyage/index.html.twig', [
            'type_voyages' => $typeVoyageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/choice_type", name="choice_type", methods={"GET"})
     */
    public function choice(TypeVoyageRepository $typeVoyageRepository): Response
    {
        return $this->render('type_voyage/choice.html.twig', [
            'type_voyages' => $typeVoyageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_type_voyage_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TypeVoyageRepository $typeVoyageRepository): Response
    {
        $typeVoyage = new TypeVoyage();
        $form = $this->createForm(TypeVoyageType::class, $typeVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeVoyageRepository->add($typeVoyage, true);

            return $this->redirectToRoute('app_type_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_voyage/new.html.twig', [
            'type_voyage' => $typeVoyage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_type_voyage_show", methods={"GET"})
     */
    public function show(TypeVoyage $typeVoyage): Response
    {
        return $this->render('type_voyage/show.html.twig', [
            'type_voyage' => $typeVoyage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_type_voyage_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeVoyage $typeVoyage, TypeVoyageRepository $typeVoyageRepository): Response
    {
        $form = $this->createForm(TypeVoyageType::class, $typeVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeVoyageRepository->add($typeVoyage, true);

            return $this->redirectToRoute('app_type_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_voyage/edit.html.twig', [
            'type_voyage' => $typeVoyage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_type_voyage_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeVoyage $typeVoyage, TypeVoyageRepository $typeVoyageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeVoyage->getId(), $request->request->get('_token'))) {
            $typeVoyageRepository->remove($typeVoyage, true);
        }

        return $this->redirectToRoute('app_type_voyage_index', [], Response::HTTP_SEE_OTHER);
    }
}
