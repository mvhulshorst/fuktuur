<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $productcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productomschrijving;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productbtw;

    /**
     * @ORM\Column(type="float")
     */
    private $productprijs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factuurregel", inversedBy="productcode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $factuurregel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductcode(): ?string
    {
        return $this->productcode;
    }

    public function setProductcode(string $productcode): self
    {
        $this->productcode = $productcode;

        return $this;
    }

    public function getProductomschrijving(): ?string
    {
        return $this->productomschrijving;
    }

    public function setProductomschrijving(string $productomschrijving): self
    {
        $this->productomschrijving = $productomschrijving;

        return $this;
    }

    public function getProductbtw(): ?string
    {
        return $this->productbtw;
    }

    public function setProductbtw(string $productbtw): self
    {
        $this->productbtw = $productbtw;

        return $this;
    }

    public function getProductprijs(): ?float
    {
        return $this->productprijs;
    }

    public function setProductprijs(float $productprijs): self
    {
        $this->productprijs = $productprijs;

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
