<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrainRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=TrainRepository::class)
 *  @ApiResource()
 */
class Train
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
    private $numero_train;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="train")
     */
    private $trajets;

    public function __construct()
    {
        $this->trajets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroTrain(): ?string
    {
        return $this->numero_train;
    }

    public function setNumeroTrain(string $numero_train): self
    {
        $this->numero_train = $numero_train;

        return $this;
    }

    // /**
    //  * @return Collection|Trajet[]
    //  */
    // public function getTrajets(): Collection
    // {
    //     return $this->trajets;
    // }

    // public function addTrajet(Trajet $trajet): self
    // {
    //     if (!$this->trajets->contains($trajet)) {
    //         $this->trajets[] = $trajet;
    //         $trajet->setTrain($this);
    //     }

    //     return $this;
    // }

    // public function removeTrajet(Trajet $trajet): self
    // {
    //     if ($this->trajets->removeElement($trajet)) {
    //         // set the owning side to null (unless already changed)
    //         if ($trajet->getTrain() === $this) {
    //             $trajet->setTrain(null);
    //         }
    //     }

    //     return $this;
    public function __toString()
    {
        return strval($this->getNumeroTrain());
    }
}
