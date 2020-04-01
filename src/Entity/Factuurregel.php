<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurregelRepository")
 */
class Factuurregel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factuur", mappedBy="factuurregel")
     */
    private $factuurnummer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="factuurregel")
     */
    private $productcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productaantal;

    public function __construct()
    {
        $this->factuurnummer = new ArrayCollection();
        $this->productcode = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|factuur[]
     */
    public function getFactuurnummer(): Collection
    {
        return $this->factuurnummer;
    }

    public function addFactuurnummer(factuur $factuurnummer): self
    {
        if (!$this->factuurnummer->contains($factuurnummer)) {
            $this->factuurnummer[] = $factuurnummer;
            $factuurnummer->setFactuurregel($this);
        }

        return $this;
    }

    public function removeFactuurnummer(factuur $factuurnummer): self
    {
        if ($this->factuurnummer->contains($factuurnummer)) {
            $this->factuurnummer->removeElement($factuurnummer);
            // set the owning side to null (unless already changed)
            if ($factuurnummer->getFactuurregel() === $this) {
                $factuurnummer->setFactuurregel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|product[]
     */
    public function getProductcode(): Collection
    {
        return $this->productcode;
    }

    public function addProductcode(product $productcode): self
    {
        if (!$this->productcode->contains($productcode)) {
            $this->productcode[] = $productcode;
            $productcode->setFactuurregel($this);
        }

        return $this;
    }

    public function removeProductcode(product $productcode): self
    {
        if ($this->productcode->contains($productcode)) {
            $this->productcode->removeElement($productcode);
            // set the owning side to null (unless already changed)
            if ($productcode->getFactuurregel() === $this) {
                $productcode->setFactuurregel(null);
            }
        }

        return $this;
    }

    public function getProductaantal(): ?string
    {
        return $this->productaantal;
    }

    public function setProductaantal(string $productaantal): self
    {
        $this->productaantal = $productaantal;

        return $this;
    }
}
