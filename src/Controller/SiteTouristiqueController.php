<?php

namespace App\Controller;

use App\Entity\SiteTouristique;
use App\Form\SiteTouristiqueType;
use App\Repository\DistrictRepository;
use App\Repository\SiteTouristiqueRepository;
use App\Repository\ThemeVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/site-touristique")
 */
class SiteTouristiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_site_touristique_index", methods={"GET"})
     */
    public function index(SiteTouristiqueRepository $siteTouristiqueRepository): Response
    {
        return $this->render('site_touristique/index.html.twig', [
            'site_touristiques' => $siteTouristiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/choice_site", name="choice_site", methods={"GET"})
     */
    public function choice(SiteTouristiqueRepository $siteTouristiqueRepository, Request $request, ThemeVoyageRepository $themeVoyageRepository, DistrictRepository $districtRepository): Response
    {
        $themeSaved = $themeVoyageRepository->find((int)$request->get('id-theme'));
        $distictConcernee = $districtRepository->findOneBy(["id"=>$themeSaved->getDistrict()->getId()]);

        $site=$siteTouristiqueRepository->findBy(["district"=>$distictConcernee]);
        return $this->render('site_touristique/choice.html.twig', [
            'site_touristiques' => $site,
            'idclient' => $request->get('id-client'),
            'idtheme' => $request->get('id-theme'),
            'iddistrict' => $distictConcernee->getId()
        ]);
    }

    /**
     * @Route("/new", name="app_site_touristique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SiteTouristiqueRepository $siteTouristiqueRepository): Response
    {
        $siteTouristique = new SiteTouristique();
        $form = $this->createForm(SiteTouristiqueType::class, $siteTouristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $siteTouristiqueRepository->add($siteTouristique, true);

            return $this->redirectToRoute('app_site_touristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('site_touristique/new.html.twig', [
            'site_touristique' => $siteTouristique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_site_touristique_show", methods={"GET"})
     */
    public function show(SiteTouristique $siteTouristique): Response
    {
        return $this->render('site_touristique/show.html.twig', [
            'site_touristique' => $siteTouristique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_site_touristique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SiteTouristique $siteTouristique, SiteTouristiqueRepository $siteTouristiqueRepository): Response
    {
        $form = $this->createForm(SiteTouristiqueType::class, $siteTouristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $siteTouristiqueRepository->add($siteTouristique, true);

            return $this->redirectToRoute('app_site_touristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('site_touristique/edit.html.twig', [
            'site_touristique' => $siteTouristique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_site_touristique_delete", methods={"POST"})
     */
    public function delete(Request $request, SiteTouristique $siteTouristique, SiteTouristiqueRepository $siteTouristiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$siteTouristique->getId(), $request->request->get('_token'))) {
            $siteTouristiqueRepository->remove($siteTouristique, true);
        }

        return $this->redirectToRoute('app_site_touristique_index', [], Response::HTTP_SEE_OTHER);
    }
}
