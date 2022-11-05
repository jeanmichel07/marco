<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=InfoClient::class, inversedBy="reservations")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Voyage::class, inversedBy="reservations")
     */
    private $voyage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDepart;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRetoure;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbrPersonne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getClient(): ?InfoClient
    {
        return $this->client;
    }

    public function setClient(?InfoClient $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getVoyage(): ?Voyage
    {
        return $this->voyage;
    }

    public function setVoyage(?Voyage $voyage): self
    {
        $this->voyage = $voyage;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDateRetoure(): ?\DateTimeInterface
    {
        return $this->dateRetoure;
    }

    public function setDateRetoure(?\DateTimeInterface $dateRetoure): self
    {
        $this->dateRetoure = $dateRetoure;

        return $this;
    }

    public function getNbrPersonne(): ?int
    {
        return $this->nbrPersonne;
    }

    public function setNbrPersonne(?int $nbrPersonne): self
    {
        $this->nbrPersonne = $nbrPersonne;

        return $this;
    }
}
