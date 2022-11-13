<?php

namespace App\Controller;

use App\Entity\ThemeVoyage;
use App\Entity\TypeVoyage;
use App\Form\ThemeVoyageType;
use App\Repository\ThemeVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/theme-voyage")
 */
class ThemeVoyageController extends AbstractController
{
    /**
     * @Route("/", name="app_theme_voyage_index", methods={"GET"})
     */
    public function index(ThemeVoyageRepository $themeVoyageRepository): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }
        return $this->render('theme_voyage/index.html.twig', [
            'theme_voyages' => $themeVoyageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/choice_theme/{id}", name="choice_theme", methods={"GET"})
     */
    public function choice(TypeVoyage $typeVoyage, ThemeVoyageRepository $themeVoyageRepository): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }
        $themes = $themeVoyageRepository->findBy(["typeVoyage"=>$typeVoyage]);

        return $this->render('theme_voyage/choice.html.twig', [
            'theme_voyages' => $themes
        ]);
    }

    /**
     * @Route("/new", name="app_theme_voyage_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ThemeVoyageRepository $themeVoyageRepository): Response
    {
        $themeVoyage = new ThemeVoyage();
        $form = $this->createForm(ThemeVoyageType::class, $themeVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themeVoyageRepository->add($themeVoyage, true);

            return $this->redirectToRoute('app_theme_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('theme_voyage/new.html.twig', [
            'theme_voyage' => $themeVoyage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_theme_voyage_show", methods={"GET"})
     */
    public function show(ThemeVoyage $themeVoyage): Response
    {
        return $this->render('theme_voyage/show.html.twig', [
            'theme_voyage' => $themeVoyage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_theme_voyage_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ThemeVoyage $themeVoyage, ThemeVoyageRepository $themeVoyageRepository): Response
    {
        $form = $this->createForm(ThemeVoyageType::class, $themeVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themeVoyageRepository->add($themeVoyage, true);

            return $this->redirectToRoute('app_theme_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('theme_voyage/edit.html.twig', [
            'theme_voyage' => $themeVoyage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_theme_voyage_delete", methods={"POST"})
     */
    public function delete(Request $request, ThemeVoyage $themeVoyage, ThemeVoyageRepository $themeVoyageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$themeVoyage->getId(), $request->request->get('_token'))) {
            $themeVoyageRepository->remove($themeVoyage, true);
        }

        return $this->redirectToRoute('app_theme_voyage_index', [], Response::HTTP_SEE_OTHER);
    }
}
