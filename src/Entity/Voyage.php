<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoyageRepository::class)
 */
class Voyage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ThemeVoyage::class, inversedBy="voyages")
     */
    private $themeVoyage;

    /**
     * @ORM\ManyToOne(targetEntity=SiteTouristique::class, inversedBy="voyages")
     */
    private $siteTouristique;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class, inversedBy="voyages")
     */
    private $activite;

    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class, inversedBy="voyages")
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity=LocVoiture::class, inversedBy="voyages")
     */
    private $locVoiture;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="voyage")
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThemeVoyage(): ?ThemeVoyage
    {
        return $this->themeVoyage;
    }

    public function setThemeVoyage(?ThemeVoyage $themeVoyage): self
    {
        $this->themeVoyage = $themeVoyage;

        return $this;
    }

    public function getSiteTouristique(): ?SiteTouristique
    {
        return $this->siteTouristique;
    }

    public function setSiteTouristique(?SiteTouristique $siteTouristique): self
    {
        $this->siteTouristique = $siteTouristique;

        return $this;
    }

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getLocVoiture(): ?LocVoiture
    {
        return $this->locVoiture;
    }

    public function setLocVoiture(?LocVoiture $locVoiture): self
    {
        $this->locVoiture = $locVoiture;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setVoyage($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getVoyage() === $this) {
                $reservation->setVoyage(null);
            }
        }

        return $this;
    }
}
