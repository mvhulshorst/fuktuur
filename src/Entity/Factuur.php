<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRepository")
 */
class Factuur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $factuurnummer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="factuur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $klantnummer;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $factuurdatum;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $vervaldatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inzakeopdracht;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $korting;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factuurregel", inversedBy="factuurnummer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $factuurregel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurnummer(): ?string
    {
        return $this->factuurnummer;
    }

    public function setFactuurnummer(string $factuurnummer): self
    {
        $this->factuurnummer = $factuurnummer;

        return $this;
    }

    public function getKlantnummer(): ?klant
    {
        return $this->klantnummer;
    }

    public function setKlantnummer(?klant $klantnummer): self
    {
        $this->klantnummer = $klantnummer;

        return $this;
    }

    public function getFactuurdatum(): ?\DateTimeInterface
    {
        return $this->factuurdatum;
    }

    public function setFactuurdatum(\DateTimeInterface $factuurdatum): self
    {
        $this->factuurdatum = $factuurdatum;

        return $this;
    }

    public function getVervaldatum(): ?\DateTimeInterface
    {
        return $this->vervaldatum;
    }

    public function setVervaldatum(\DateTimeInterface $vervaldatum): self
    {
        $this->vervaldatum = $vervaldatum;

        return $this;
    }

    public function getInzakeopdracht(): ?string
    {
        return $this->inzakeopdracht;
    }

    public function setInzakeopdracht(string $inzakeopdracht): self
    {
        $this->inzakeopdracht = $inzakeopdracht;

        return $this;
    }

    public function getKorting(): ?string
    {
        return $this->korting;
    }

    public function setKorting(?string $korting): self
    {
        $this->korting = $korting;

        return $this;
    }

    public function getFactuurregel(): ?Factuurregel
    {
        return $this->factuurregel;
    }

    public function setFactuurregel(?Factuurregel $factuurregel): self
    {
        $this->factuurregel = $factuurregel;

        return $this;
    }
}
