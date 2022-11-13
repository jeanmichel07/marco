<?php

namespace App\Entity;

use App\Repository\DistrictRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DistrictRepository::class)
 */
class District
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="districts")
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Activite::class, mappedBy="district")
     */
    private $activites;

    /**
     * @ORM\OneToMany(targetEntity=Hotel::class, mappedBy="district")
     */
    private $hotels;

    /**
     * @ORM\OneToMany(targetEntity=TopVoyage::class, mappedBy="district")
     */
    private $topVoyages;

    /**
     * @ORM\OneToMany(targetEntity=SiteTouristique::class, mappedBy="district")
     */
    private $siteTouristiques;

    /**
     * @ORM\OneToMany(targetEntity=ThemeVoyage::class, mappedBy="district")
     */
    private $themeVoyage;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
        $this->hotels = new ArrayCollection();
        $this->topVoyages = new ArrayCollection();
        $this->siteTouristiques = new ArrayCollection();
        $this->themeVoyage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }



    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivites(Activite $activites): self
    {
        if (!$this->activites->contains($activites)) {
            $this->activites[] = $activites;
            $activites->setDistrict($this);
        }

        return $this;
    }

    public function removeActivites(Activite $activites): self
    {
        if ($this->activites->removeElement($activites)) {
            // set the owning side to null (unless already changed)
            if ($activites->getDistrict() === $this) {
                $activites->setDistrict(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Hotel>
     */
    public function getHotels(): Collection
    {
        return $this->hotels;
    }

    public function addHotel(Hotel $hotel): self
    {
        if (!$this->hotels->contains($hotel)) {
            $this->hotels[] = $hotel;
            $hotel->setDistrict($this);
        }

        return $this;
    }

    public function removeHotel(Hotel $hotel): self
    {
        if ($this->hotels->removeElement($hotel)) {
            // set the owning side to null (unless already changed)
            if ($hotel->getDistrict() === $this) {
                $hotel->setDistrict(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TopVoyage>
     */
    public function getTopVoyages(): Collection
    {
        return $this->topVoyages;
    }

    public function addTopVoyage(TopVoyage $topVoyage): self
    {
        if (!$this->topVoyages->contains($topVoyage)) {
            $this->topVoyages[] = $topVoyage;
            $topVoyage->setDistrict($this);
        }

        return $this;
    }

    public function removeTopVoyage(TopVoyage $topVoyage): self
    {
        if ($this->topVoyages->removeElement($topVoyage)) {
            // set the owning side to null (unless already changed)
            if ($topVoyage->getDistrict() === $this) {
                $topVoyage->setDistrict(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiteTouristique>
     */
    public function getSiteTouristiques(): Collection
    {
        return $this->siteTouristiques;
    }

    public function addSiteTouristique(SiteTouristique $siteTouristique): self
    {
        if (!$this->siteTouristiques->contains($siteTouristique)) {
            $this->siteTouristiques[] = $siteTouristique;
            $siteTouristique->setDistrict($this);
        }

        return $this;
    }

    public function removeSiteTouristique(SiteTouristique $siteTouristique): self
    {
        if ($this->siteTouristiques->removeElement($siteTouristique)) {
            // set the owning side to null (unless already changed)
            if ($siteTouristique->getDistrict() === $this) {
                $siteTouristique->setDistrict(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }

    /**
     * @return Collection<int, ThemeVoyage>
     */
    public function getThemeVoyages(): Collection
    {
        return $this->siteTouristiques;
    }

    public function addThemeVoyage(ThemeVoyage $siteTouristique): self
    {
        if (!$this->siteTouristiques->contains($siteTouristique)) {
            $this->siteTouristiques[] = $siteTouristique;
            $siteTouristique->setThemeVoyage($this);
        }

        return $this;
    }

    public function removeThemeVoyage(ThemeVoyage $siteTouristique): self
    {
        if ($this->siteTouristiques->removeElement($siteTouristique)) {
            // set the owning side to null (unless already changed)
            if ($siteTouristique->getDistrict() === $this) {
                $siteTouristique->setDistrict(null);
            }
        }

        return $this;
    }
}
