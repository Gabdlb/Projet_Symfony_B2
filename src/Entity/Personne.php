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
    private $dette;

    /**
     * @ORM\Column(type="float")
     */
    private $arecevoir;

    /**
     * @ORM\Column(type="float")
     */
    private $apayer;

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

    public function getDette(): ?float
    {
        return $this->dette;
    }

    public function setDette(float $dette): self
    {
        $this->dette = $dette;

        return $this;
    }

    public function getArecevoir(): ?float
    {
        return $this->arecevoir;
    }

    public function setArecevoir(float $arecevoir): self
    {
        $this->arecevoir = $arecevoir;

        return $this;
    }

    public function getApayer(): ?float
    {
        return $this->apayer;
    }

    public function setApayer(float $apayer): self
    {
        $this->apayer = $apayer;

        return $this;
    }
}
