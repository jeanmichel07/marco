<?php

namespace App\Entity;

use App\Repository\TypeVoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeVoyageRepository::class)
 */
class TypeVoyage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $caracteristique;

    /**
     * @ORM\OneToMany(targetEntity=ThemeVoyage::class, mappedBy="typeVoyage")
     */
    private $themeVoyages;

    public function __construct()
    {
        $this->themeVoyages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getCaracteristique(): ?string
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(string $caracteristique): self
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    /**
     * @return Collection<int, ThemeVoyage>
     */
    public function getThemeVoyages(): Collection
    {
        return $this->themeVoyages;
    }

    public function addThemeVoyage(ThemeVoyage $themeVoyage): self
    {
        if (!$this->themeVoyages->contains($themeVoyage)) {
            $this->themeVoyages[] = $themeVoyage;
            $themeVoyage->setTypeVoyage($this);
        }

        return $this;
    }

    public function removeThemeVoyage(ThemeVoyage $themeVoyage): self
    {
        if ($this->themeVoyages->removeElement($themeVoyage)) {
            // set the owning side to null (unless already changed)
            if ($themeVoyage->getTypeVoyage() === $this) {
                $themeVoyage->setTypeVoyage(null);
            }
        }

        return $this;
    }
}
