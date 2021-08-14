<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReservationRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 *  @ApiResource()
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
     * @ORM\Column(type="boolean")
     */
    private $confirmee;

    /**
     * @ORM\ManyToOne(targetEntity=Passager::class, inversedBy="reservations")
     */
    private $passager;

    /**
     * @ORM\ManyToOne(targetEntity=Trajet::class, inversedBy="relation")
     */
    private $trajet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfirmee(): ?bool
    {
        return $this->confirmee;
    }

    public function setConfirmee(bool $confirmee): self
    {
        $this->confirmee = $confirmee;

        return $this;
    }

    public function getPassager(): ?Passager
    {
        return $this->passager;
    }

    public function setPassager(?Passager $passager): self
    {
        $this->passager = $passager;

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?Trajet $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }
}
