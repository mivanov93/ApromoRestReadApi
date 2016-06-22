<?php

namespace AppBundle\Entity;

/**
 * Shops
 */
class Shops
{
    /**
     * @var string
     */
    private $shopName;

    /**
     * @var integer
     */
    private $shopParkSlots = '0';

    /**
     * @var string
     */
    private $shopLocation;

    /**
     * @var float
     */
    private $shopLatitude = '0';

    /**
     * @var float
     */
    private $shopLongitude = '0';

    /**
     * @var string
     */
    private $shopPhone = '0';

    /**
     * @var integer
     */
    private $shopAddtime = '0';

    /**
     * @var integer
     */
    private $shopLastmodified = '0';

    /**
     * @var string
     */
    private $shopOpens;

    /**
     * @var string
     */
    private $shopCloses;

    /**
     * @var string
     */
    private $shopOpensSat;

    /**
     * @var string
     */
    private $shopClosesSat;

    /**
     * @var string
     */
    private $shopOpensSun;

    /**
     * @var string
     */
    private $shopClosesSun;

    /**
     * @var boolean
     */
    private $shopActive = '1';

    /**
     * @var integer
     */
    private $shopId;

    /**
     * @var \AppBundle\Entity\Cities
     */
    private $shopCity;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $shopBrand;


    /**
     * Set shopName
     *
     * @param string $shopName
     *
     * @return Shops
     */
    public function setShopName($shopName)
    {
        $this->shopName = $shopName;

        return $this;
    }

    /**
     * Get shopName
     *
     * @return string
     */
    public function getShopName()
    {
        return $this->shopName;
    }

    /**
     * Set shopParkSlots
     *
     * @param integer $shopParkSlots
     *
     * @return Shops
     */
    public function setShopParkSlots($shopParkSlots)
    {
        $this->shopParkSlots = $shopParkSlots;

        return $this;
    }

    /**
     * Get shopParkSlots
     *
     * @return integer
     */
    public function getShopParkSlots()
    {
        return $this->shopParkSlots;
    }

    /**
     * Set shopLocation
     *
     * @param string $shopLocation
     *
     * @return Shops
     */
    public function setShopLocation($shopLocation)
    {
        $this->shopLocation = $shopLocation;

        return $this;
    }

    /**
     * Get shopLocation
     *
     * @return string
     */
    public function getShopLocation()
    {
        return $this->shopLocation;
    }

    /**
     * Set shopLatitude
     *
     * @param float $shopLatitude
     *
     * @return Shops
     */
    public function setShopLatitude($shopLatitude)
    {
        $this->shopLatitude = $shopLatitude;

        return $this;
    }

    /**
     * Get shopLatitude
     *
     * @return float
     */
    public function getShopLatitude()
    {
        return $this->shopLatitude;
    }

    /**
     * Set shopLongitude
     *
     * @param float $shopLongitude
     *
     * @return Shops
     */
    public function setShopLongitude($shopLongitude)
    {
        $this->shopLongitude = $shopLongitude;

        return $this;
    }

    /**
     * Get shopLongitude
     *
     * @return float
     */
    public function getShopLongitude()
    {
        return $this->shopLongitude;
    }

    /**
     * Set shopPhone
     *
     * @param string $shopPhone
     *
     * @return Shops
     */
    public function setShopPhone($shopPhone)
    {
        $this->shopPhone = $shopPhone;

        return $this;
    }

    /**
     * Get shopPhone
     *
     * @return string
     */
    public function getShopPhone()
    {
        return $this->shopPhone;
    }

    /**
     * Set shopAddtime
     *
     * @param integer $shopAddtime
     *
     * @return Shops
     */
    public function setShopAddtime($shopAddtime)
    {
        $this->shopAddtime = $shopAddtime;

        return $this;
    }

    /**
     * Get shopAddtime
     *
     * @return integer
     */
    public function getShopAddtime()
    {
        return $this->shopAddtime;
    }

    /**
     * Set shopLastmodified
     *
     * @param integer $shopLastmodified
     *
     * @return Shops
     */
    public function setShopLastmodified($shopLastmodified)
    {
        $this->shopLastmodified = $shopLastmodified;

        return $this;
    }

    /**
     * Get shopLastmodified
     *
     * @return integer
     */
    public function getShopLastmodified()
    {
        return $this->shopLastmodified;
    }

    /**
     * Set shopOpens
     *
     * @param string $shopOpens
     *
     * @return Shops
     */
    public function setShopOpens($shopOpens)
    {
        $this->shopOpens = $shopOpens;

        return $this;
    }

    /**
     * Get shopOpens
     *
     * @return string
     */
    public function getShopOpens()
    {
        return $this->shopOpens;
    }

    /**
     * Set shopCloses
     *
     * @param string $shopCloses
     *
     * @return Shops
     */
    public function setShopCloses($shopCloses)
    {
        $this->shopCloses = $shopCloses;

        return $this;
    }

    /**
     * Get shopCloses
     *
     * @return string
     */
    public function getShopCloses()
    {
        return $this->shopCloses;
    }

    /**
     * Set shopOpensSat
     *
     * @param string $shopOpensSat
     *
     * @return Shops
     */
    public function setShopOpensSat($shopOpensSat)
    {
        $this->shopOpensSat = $shopOpensSat;

        return $this;
    }

    /**
     * Get shopOpensSat
     *
     * @return string
     */
    public function getShopOpensSat()
    {
        return $this->shopOpensSat;
    }

    /**
     * Set shopClosesSat
     *
     * @param string $shopClosesSat
     *
     * @return Shops
     */
    public function setShopClosesSat($shopClosesSat)
    {
        $this->shopClosesSat = $shopClosesSat;

        return $this;
    }

    /**
     * Get shopClosesSat
     *
     * @return string
     */
    public function getShopClosesSat()
    {
        return $this->shopClosesSat;
    }

    /**
     * Set shopOpensSun
     *
     * @param string $shopOpensSun
     *
     * @return Shops
     */
    public function setShopOpensSun($shopOpensSun)
    {
        $this->shopOpensSun = $shopOpensSun;

        return $this;
    }

    /**
     * Get shopOpensSun
     *
     * @return string
     */
    public function getShopOpensSun()
    {
        return $this->shopOpensSun;
    }

    /**
     * Set shopClosesSun
     *
     * @param string $shopClosesSun
     *
     * @return Shops
     */
    public function setShopClosesSun($shopClosesSun)
    {
        $this->shopClosesSun = $shopClosesSun;

        return $this;
    }

    /**
     * Get shopClosesSun
     *
     * @return string
     */
    public function getShopClosesSun()
    {
        return $this->shopClosesSun;
    }

    /**
     * Set shopActive
     *
     * @param boolean $shopActive
     *
     * @return Shops
     */
    public function setShopActive($shopActive)
    {
        $this->shopActive = $shopActive;

        return $this;
    }

    /**
     * Get shopActive
     *
     * @return boolean
     */
    public function getShopActive()
    {
        return $this->shopActive;
    }

    /**
     * Get shopId
     *
     * @return integer
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Set shopCity
     *
     * @param \AppBundle\Entity\Cities $shopCity
     *
     * @return Shops
     */
    public function setShopCity(\AppBundle\Entity\Cities $shopCity = null)
    {
        $this->shopCity = $shopCity;

        return $this;
    }

    /**
     * Get shopCity
     *
     * @return \AppBundle\Entity\Cities
     */
    public function getShopCity()
    {
        return $this->shopCity;
    }

    /**
     * Set shopBrand
     *
     * @param \AppBundle\Entity\Brands $shopBrand
     *
     * @return Shops
     */
    public function setShopBrand(\AppBundle\Entity\Brands $shopBrand = null)
    {
        $this->shopBrand = $shopBrand;

        return $this;
    }

    /**
     * Get shopBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getShopBrand()
    {
        return $this->shopBrand;
    }
}

