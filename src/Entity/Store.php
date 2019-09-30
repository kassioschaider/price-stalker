<?php


namespace KassioSchaider\PriceStalker\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Store
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $name;
    /**
     * @ManyToMany(targetEntity="Product", inversedBy="stores")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function addProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            return $this;
        }

        $this->products->add($product);
        $product->addStore($this);

        return $this;
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }
}
