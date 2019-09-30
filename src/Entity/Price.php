<?php


namespace KassioSchaider\PriceStalker\Entity;

/**
 * @Entity
 */
class Price
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="float")
     */
    private $value;
    /**
     * @Column(type="string")
     */
    private $channel;
    /**
     * @ManyToOne(targetEntity="Product")
     */
    private $product;

    public function getId() : int
    {
        return $this->id;
    }

    public function getValue() : float
    {
        return $this->value;
    }

    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getChannel() : string
    {
        return $this->channel;
    }

    public function setChannel($channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function getProduct() : Product
    {
        return $this->product;
    }

    public function setProduct($product): self
    {
        $this->product = $product;
        return $this;
    }

    public function __toString()
    {
        return $this->id . ' - ' . $this->channel . ' - ' . $this->value;
    }
}
