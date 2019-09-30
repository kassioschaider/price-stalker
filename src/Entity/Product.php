<?php


namespace KassioSchaider\PriceStalker\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Product
{
    /**
     * @id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string", nullable=false)
     */
    private $barCode;
    /**
     * @Column(type="string")
     */
    private $name;
    /**
     * @Column(type="float")
     */
    private $mainPrice;
    /**
     * @OneToMany(targetEntity="Price", mappedBy="product", cascade={"remove", "persist"})
     */
    private $prices;
    /**
     * @ManyToMany(targetEntity="Store", mappedBy="products")
     */
    private $stores;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
        $this->stores = new ArrayCollection();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getBarCode() : string
    {
        return $this->barCode;
    }

    public function setBarCode($barCode) : self
    {
        $this->barCode = $barCode;
        return $this;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName($name) : self
    {
        $this->name = $name;
        return $this;
    }

    public function getMainPrice() : float
    {
        return $this->mainPrice;
    }

    public function setMainPrice($mainPrice) : self
    {
        $this->mainPrice = $mainPrice;
        return $this;
    }

    public function __toString() : string
    {
        return $this->id . ' - ' . $this->barCode . ' - ' . $this->name . ' - ' . $this->mainPrice;
    }

    public function addPrice(Price $price) : self
    {
        $this->prices->add($price);
        $price->setProduct($this);
        return $this;
    }

    public function getPrices() : Collection
    {
        return $this->prices;
    }

    public function addStore(Store $store): self
    {
        if ($this->stores->contains($store)) {
            return $this;
        }

        $this->stores->add($store);
        $store->addProduct($this);

        return $this;
    }
    
    public function getStores(): Collection
    {
        return $this->stores;
    }
}