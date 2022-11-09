<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute("app_login");
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @return Response
     * @Route("/about", name="app_about")
     */
    public function about()
    {
        return $this->render('home/about.html.twig');
    }
    /**
     * @return Response
     * @Route("/top", name="app_top")
     */
    public function top()
    {
        return $this->render('home/voyage/top.html.twig');
    }
    /**
     * @return Response
     * @Route("/activitefaire", name="app_activitefaire")
     */
    public function activitefaire()
    {
        return $this->render('home/voyage/topvoyage/activitefaire.html.twig');
    }
    /**
     * @return Response
     * @Route("/lieuvisite", name="app_lieuvisite")
     */
    public function lieuvisite()
    {
        return $this->render('home/voyage/topvoyage/lieuvisite.html.twig');
    }
    /**
     * @return Response
     * @Route("/monument", name="app_monument")
     */
    public function monument()
    {
        return $this->render('home/voyage/topvoyage/monument.html.twig');
    }
    /**
     * @return Response
     * @Route("/principesite", name="app_principesite")
     */
    public function principesite()
    {
        return $this->render('home/voyage/topvoyage/principesite.html.twig');
    }
    /**
     * @return Response
     * @Route("/principesitediego", name="app_principesitediego")
     */
    public function principesitediego()
    {
        return $this->render('home/voyage/topvoyage/principesite/principesitediego.html.twig');
    }
    /**
     * @return Response
     * @Route("/principesitemajunga", name="app_principesitemajunga")
     */
    public function principesitemajunga()
    {
        return $this->render('home/voyage/topvoyage/principesite/principesitemajunga.html.twig');
    }
    /**
     * @return Response
     * @Route("/principesitetamatave", name="app_principesitetamatave")
     */
    public function principesitetamatave()
    {
        return $this->render('home/voyage/topvoyage/principesite/principesitetamatave.html.twig');
    }
    /**
     * @return Response
     * @Route("/principesitetulear", name="app_principesitetulear")
     */
    public function principesitetulear()
    {
        return $this->render('home/voyage/topvoyage/principesite/principesitetulear.html.twig');
    }
    /**
     * @return Response
     * @Route("/principesitefianarantsoa", name="app_principesitefianarantsoa")
     */
    public function principesitefianarantsoa()
    {
        return $this->render('home/voyage/topvoyage/principesite/principesitefianarantsoa.html.twig');
    }
    /**
     * @return Response
     * @Route("/principesiteantananarivo", name="app_principesiteantananarivo")
     */
    public function principesiteantananarivo()
    {
        return $this->render('home/voyage/topvoyage/principesite/principesiteantananarivo.html.twig');
    }
    /**
     * @return Response
     * @Route("/mada", name="app_mada")
     */
    public function mada()
    {
        return $this->render('home/mada.html.twig');
    }
    /**
     * @return Response
     * @Route("/identite", name="app_identite")
     */
    public function identite()
    {
        return $this->render('home/madagascar/identite.html.twig');
    }
    /**
     * @return Response
     * @Route("/culture", name="app_culture")
     */
    public function culture()
    {
        return $this->render('home/madagascar/identite/culture.html.twig');
    }
    /**
     * @return Response
     * @Route("/fauneflore", name="app_fauneflore")
     */
    public function fauneflore()
    {
        return $this->render('home/madagascar/identite/fauneflore.html.twig');
    }
    /**
     * @return Response
     * @Route("/provinces", name="app_provinces")
     */
    public function provinces()
    {
        return $this->render('home/madagascar/identite/provinces.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincediego", name="app_provincediego")
     */
    public function provincediego()
    {
        return $this->render('home/madagascar/identite/province/provincediego.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincediegodiana", name="app_provincediegodiana")
     */
    public function provincediegodiana()
    {
        return $this->render('home/madagascar/identite/province/regiondiego/provincediegodiana.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincediegosava", name="app_provincediegosava")
     */
    public function provincediegosava()
    {
        return $this->render('home/madagascar/identite/province/regiondiego/provincediegosava.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincemajunga", name="app_provincemajunga")
     */
    public function provincemajunga()
    {
        return $this->render('home/madagascar/identite/province/provincemajunga.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincemajungasofia", name="app_provincemajungasofia")
     */
    public function provincemajungasofia()
    {
        return $this->render('home/madagascar/identite/province/regionmajunga/provincemajungasofia.html.twig');
    }
    /**
     * @return Response
     *
     * @Route("/app_provincemajungaboeny", name="app_provincemajungaboeny")
     */
    public function app_provincemajungaboeny()
    {
        return $this->render('home/madagascar/identite/province/regionmajunga/provincemajungaboeny.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincemajungabetsiboka", name="app_provincemajungabetsiboka")
     */
    public function provincemajungabetsiboka()
    {
        return $this->render('home/madagascar/identite/province/regionmajunga/provincemajungabetsiboka.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincemajungamelaky", name="app_provincemajungamelaky")
     */
    public function provincemajungamelaky()
    {
        return $this->render('home/madagascar/identite/province/regionmajunga/provincemajungamelaky.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetamatave", name="app_provincetamatave")
     */
    public function provincetamatave()
    {
        return $this->render('home/madagascar/identite/province/provincetamatave.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetamatavealaotra", name="app_provincetamatavealaotra")
     */
    public function provincetamatavealaotra()
    {
        return $this->render('home/madagascar/identite/province/regiontamatave/provincetamatavealaotra.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetamataveatsinanana", name="app_provincetamataveatsinanana")
     */
    public function provincetamataveatsinanana()
    {
        return $this->render('home/madagascar/identite/province/regiontamatave/provincetamataveatsinanana.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetamataveanalanjirofo", name="app_provincetamataveanalanjirofo")
     */
    public function provincetamataveanalanjirofo()
    {
        return $this->render('home/madagascar/identite/province/regiontamatave/provincetamataveanalanjirofo.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincefianarantsoa", name="app_provincefianarantsoa")
     */
    public function provincefianarantsoa()
    {
        return $this->render('home/madagascar/identite/province/provincefianarantsoa.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincefianarantsoamania", name="app_provincefianarantsoamania")
     */
    public function provincefianarantsoamania()
    {
        return $this->render('home/madagascar/identite/province/regionfianarantsoa/provincefianarantsoamania.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincefianarantsoahaute", name="app_provincefianarantsoahaute")
     */
    public function provincefianarantsoahaute()
    {
        return $this->render('home/madagascar/identite/province/regionfianarantsoa/provincefianarantsoahaute.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincefianarantsoavatovavy", name="app_provincefianarantsoavatovavy")
     */
    public function provincefianarantsoavatovavy()
    {
        return $this->render('home/madagascar/identite/province/regionfianarantsoa/provincefianarantsoavatovavy.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincefianarantsoafitovinany", name="app_provincefianarantsoafitovinany")
     */
    public function provincefianarantsoafitovinany()
    {
        return $this->render('home/madagascar/identite/province/regionfianarantsoa/provincefianarantsoafitovinany.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincefianarantsoatsimoatsi", name="app_provincefianarantsoatsimoatsi")
     */
    public function app_provincefianarantsoatsimoatsi()
    {
        return $this->render('home/madagascar/identite/province/regionfianarantsoa/provincefianarantsoatsimoatsi.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincefianarantsoaihorombe", name="app_provincefianarantsoaihorombe")
     */
    public function app_provincefianarantsoaihorombe()
    {
        return $this->render('home/madagascar/identite/province/regionfianarantsoa/provincefianarantsoaihorombe.html.twig');
    }
    /**
     * @return Response
     * @Route("/provinceantananarivo", name="app_provinceantananarivo")
     */
    public function provinceantananarivo()
    {
        return $this->render('home/madagascar/identite/province/provinceantananarivo.html.twig');
    }
    /**
     * @return Response
     * @Route("/provinceantananarivoitasy", name="app_provinceantananarivoitasy")
     */
    public function provinceantananarivoitasy()
    {
        return $this->render('home/madagascar/identite/province/regionantananarivo/provinceantananarivoitasy.html.twig');
    }
    /**
     * @return Response
     * @Route("/provinceantananarivoanalamanga", name="app_provinceantananarivoanalamanga")
     */
    public function provinceantananarivoanalamanga()
    {
        return $this->render('home/madagascar/identite/province/regionantananarivo/provinceantananarivoanalamanga.html.twig');
    }
    /**
     * @return Response
     * @Route("/provinceantananarivovakinankaratra", name="app_provinceantananarivovakinankaratra")
     */
    public function provinceantananarivovakinankaratra()
    {
        return $this->render('home/madagascar/identite/province/regionantananarivo/provinceantananarivovakinankaratra.html.twig');
    }
    /**
     * @return Response
     * @Route("/provinceantananarivobogonlava", name="app_provinceantananarivobogonlava")
     */
    public function provinceantananarivobogonlava()
    {
        return $this->render('home/madagascar/identite/province/regionantananarivo/provinceantananarivobogonlava.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetulear", name="app_provincetulear")
     */
    public function provincetulear()
    {
        return $this->render('home/madagascar/identite/province/provincetulear.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetulearmenabe", name="app_provincetulearmenabe")
     */
    public function provincetulearmenabe()
    {
        return $this->render('home/madagascar/identite/province/regiontulear/provincetulearmenabe.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetulearatsimoandre", name="app_provincetulearatsimoandre")
     */
    public function provincetulearatsimoandre()
    {
        return $this->render('home/madagascar/identite/province/regiontulear/provincetulearatsimoandre.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetulearandroy", name="app_provincetulearandroy")
     */
    public function provincetulearandroy()
    {
        return $this->render('home/madagascar/identite/province/regiontulear/provincetulearandroy.html.twig');
    }
    /**
     * @return Response
     * @Route("/provincetulearanosy", name="app_provincetulearanosy")
     */
    public function provincetulearanosy()
    {
        return $this->render('home/madagascar/identite/province/regiontulear/provincetulearanosy.html.twig');
    }
}
