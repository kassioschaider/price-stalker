<?php


namespace KassioSchaider\PriceStalker\Entity;

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
    private $myPrice;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBarCode()
    {
        return $this->barCode;
    }

    /**
     * @param mixed $barCode
     */
    public function setBarCode($barCode)
    {
        $this->barCode = $barCode;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMyPrice()
    {
        return $this->myPrice;
    }

    /**
     * @param mixed $myPrice
     */
    public function setMyPrice($myPrice)
    {
        $this->myPrice = $myPrice;
    }

    public function __toString()
    {
        return $this->id . ' - ' . $this->barCode . ' - ' . $this->name . ' - ' . $this->myPrice;
    }

}