<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Form\ActiviteType;
use App\Repository\ActiviteRepository;
use App\Repository\DistrictRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/activite")
 */
class ActiviteController extends AbstractController
{
    /**
     * @Route("/", name="app_activite_index", methods={"GET"})
     */
    public function index(ActiviteRepository $activiteRepository): Response
    {
        return $this->render('activite/index.html.twig', [
            'activites' => $activiteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/choie_activity", name="choie_activity", methods={"GET"})
     */
    public function choice(ActiviteRepository $activiteRepository,Request $request, DistrictRepository $districtRepository): Response
    {
        // les idées choisi
        $idsite = $request->get('id-site');
        $idclient = $request->get('id-client');
        $idtheme = $request->get('id-theme');
        $iddistrict = $request->get('id-district');

        $district = $districtRepository->find($iddistrict);

        $activity = $activiteRepository->findBy(["district"=>$district]);

        return $this->render('activite/choice.html.twig', [
            'activites' => $activity,
            'idsite'=>$idsite,
            'idclient'=>$idclient,
            'idtheme'=>$idtheme,
            'iddistrict'=>$iddistrict
        ]);
    }

    /**
     * @Route("/new", name="app_activite_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ActiviteRepository $activiteRepository): Response
    {
        $activite = new Activite();
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $activiteRepository->add($activite, true);

            return $this->redirectToRoute('app_activite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('activite/new.html.twig', [
            'activite' => $activite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_activite_show", methods={"GET"})
     */
    public function show(Activite $activite): Response
    {
        return $this->render('activite/show.html.twig', [
            'activite' => $activite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_activite_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Activite $activite, ActiviteRepository $activiteRepository): Response
    {
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $activiteRepository->add($activite, true);

            return $this->redirectToRoute('app_activite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('activite/edit.html.twig', [
            'activite' => $activite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_activite_delete", methods={"POST"})
     */
    public function delete(Request $request, Activite $activite, ActiviteRepository $activiteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activite->getId(), $request->request->get('_token'))) {
            $activiteRepository->remove($activite, true);
        }

        return $this->redirectToRoute('app_activite_index', [], Response::HTTP_SEE_OTHER);
    }
}
