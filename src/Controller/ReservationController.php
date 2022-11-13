<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ActiviteRepository;
use App\Repository\HotelRepository;
use App\Repository\InfoClientRepository;
use App\Repository\ReservationRepository;
use App\Repository\SiteTouristiqueRepository;
use App\Repository\ThemeVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservation")
 */
class ReservationController extends AbstractController
{
    private $siteRepo;
    private $clientRepo;
    private $themeRepo;
    private $districtRepo;
    private $activityRepo;
    private $hotelRepo;

    public function __construct(SiteTouristiqueRepository $siteRepo, InfoClientRepository $clientRepo, ThemeVoyageRepository $themeRepo, ActiviteRepository  $activityRepo, HotelRepository  $hotelRepo)
    {
        $this->siteRepo = $siteRepo;
        $this->clientRepo = $clientRepo;
        $this->themeRepo = $themeRepo;
        $this->activityRepo = $activityRepo;
        $this->hotelRepo = $hotelRepo;
    }

    /**
     * @Route("/", name="app_reservation_index")
     */
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render("reservation/index.html.twig", [
            "reservations" => $reservationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/create/voyage-reservation", name="create_voyage_resrvation")
     */
    public function createVoyageAndRes(ReservationRepository $reservationRepository, Request $request): Response
    {
        $idsite = $request->get('id-site');
        $idclient = $request->get('id-client');
        $idtheme = $request->get('id-theme');
        $iddistrict = $request->get('id-district');
        $idactivity = $request->get('id-activity');
        $idhotel = $request->get('id-hotel');

        // les choix
        $site = $this->siteRepo->find($idsite);
        $client = $this->clientRepo->find($idclient);
        $theme = $this->themeRepo->find($idtheme);
        $activty = $this->activityRepo->find($idactivity);
        $hotel = $this->hotelRepo->find($idhotel);

        return $this->render("reservation/createVR.html.twig", [
            "site" => $site,
            "client" => $client,
            "theme" => $theme,
            "activty" => $activty,
            "hotel" => $hotel,
        ]);
    }

    /**
     * @Route("/new", name="app_reservation_new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute("app_reservation_index", [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm("reservation/new.html.twig", [
            "reservation" => $reservation,
            "form" => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_reservation_show")
     */
    public function show(Reservation $reservation): Response
    {
        return $this->render("reservation/show.html.twig", [
            "reservation" => $reservation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_reservation_edit")
     */
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute("app_reservation_index", [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm("reservation/edit.html.twig", [
            "reservation" => $reservation,
            "form" => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_reservation_delete")
     */
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid("delete".$reservation->getId(), $request->request->get("_token"))) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute("app_reservation_index", [], Response::HTTP_SEE_OTHER);
    }
}
