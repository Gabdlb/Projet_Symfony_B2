<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne
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
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $depense;

    /**
     * @ORM\Column(type="float")
     */
    private $dette;

    /**
     * @ORM\Column(type="float")
     */
    private $recu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDepense(): ?float
    {
        return $this->depense;
    }

    public function setDepense(float $depense): self
    {
        $this->depense = $depense;

        return $this;
    }

    public function getDette(): ?float
    {
        return $this->dette;
    }

    public function setDette(float $dette): self
    {
        $this->dette = $dette;

        return $this;
    }

    public function getRecu(): ?float
    {
        return $this->recu;
    }

    public function setRecu(float $recu): self
    {
        $this->recu = $recu;

        return $this;
    }
}
