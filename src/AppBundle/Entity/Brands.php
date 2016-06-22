<?php

namespace AppBundle\Entity;

/**
 * Brands
 */
class Brands
{
    /**
     * @var string
     */
    private $brandName;

    /**
     * @var boolean
     */
    private $brandPartner = '1';

    /**
     * @var integer
     */
    private $brandAddtime = '0';

    /**
     * @var integer
     */
    private $brandLastmodified = '0';

    /**
     * @var integer
     */
    private $brandExpiration = '0';

    /**
     * @var string
     */
    private $brandDescr;

    /**
     * @var string
     */
    private $brandUrl;

    /**
     * @var integer
     */
    private $brandOrder = '0';

    /**
     * @var boolean
     */
    private $brandActive = '1';

    /**
     * @var integer
     */
    private $brandPrcount = '0';

    /**
     * @var integer
     */
    private $brandShopcount = '0';

    /**
     * @var integer
     */
    private $brandId;


    /**
     * Set brandName
     *
     * @param string $brandName
     *
     * @return Brands
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * Get brandName
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Set brandPartner
     *
     * @param boolean $brandPartner
     *
     * @return Brands
     */
    public function setBrandPartner($brandPartner)
    {
        $this->brandPartner = $brandPartner;

        return $this;
    }

    /**
     * Get brandPartner
     *
     * @return boolean
     */
    public function getBrandPartner()
    {
        return $this->brandPartner;
    }

    /**
     * Set brandAddtime
     *
     * @param integer $brandAddtime
     *
     * @return Brands
     */
    public function setBrandAddtime($brandAddtime)
    {
        $this->brandAddtime = $brandAddtime;

        return $this;
    }

    /**
     * Get brandAddtime
     *
     * @return integer
     */
    public function getBrandAddtime()
    {
        return $this->brandAddtime;
    }

    /**
     * Set brandLastmodified
     *
     * @param integer $brandLastmodified
     *
     * @return Brands
     */
    public function setBrandLastmodified($brandLastmodified)
    {
        $this->brandLastmodified = $brandLastmodified;

        return $this;
    }

    /**
     * Get brandLastmodified
     *
     * @return integer
     */
    public function getBrandLastmodified()
    {
        return $this->brandLastmodified;
    }

    /**
     * Set brandExpiration
     *
     * @param integer $brandExpiration
     *
     * @return Brands
     */
    public function setBrandExpiration($brandExpiration)
    {
        $this->brandExpiration = $brandExpiration;

        return $this;
    }

    /**
     * Get brandExpiration
     *
     * @return integer
     */
    public function getBrandExpiration()
    {
        return $this->brandExpiration;
    }

    /**
     * Set brandDescr
     *
     * @param string $brandDescr
     *
     * @return Brands
     */
    public function setBrandDescr($brandDescr)
    {
        $this->brandDescr = $brandDescr;

        return $this;
    }

    /**
     * Get brandDescr
     *
     * @return string
     */
    public function getBrandDescr()
    {
        return $this->brandDescr;
    }

    /**
     * Set brandUrl
     *
     * @param string $brandUrl
     *
     * @return Brands
     */
    public function setBrandUrl($brandUrl)
    {
        $this->brandUrl = $brandUrl;

        return $this;
    }

    /**
     * Get brandUrl
     *
     * @return string
     */
    public function getBrandUrl()
    {
        return $this->brandUrl;
    }

    /**
     * Set brandOrder
     *
     * @param integer $brandOrder
     *
     * @return Brands
     */
    public function setBrandOrder($brandOrder)
    {
        $this->brandOrder = $brandOrder;

        return $this;
    }

    /**
     * Get brandOrder
     *
     * @return integer
     */
    public function getBrandOrder()
    {
        return $this->brandOrder;
    }

    /**
     * Set brandActive
     *
     * @param boolean $brandActive
     *
     * @return Brands
     */
    public function setBrandActive($brandActive)
    {
        $this->brandActive = $brandActive;

        return $this;
    }

    /**
     * Get brandActive
     *
     * @return boolean
     */
    public function getBrandActive()
    {
        return $this->brandActive;
    }

    /**
     * Set brandPrcount
     *
     * @param integer $brandPrcount
     *
     * @return Brands
     */
    public function setBrandPrcount($brandPrcount)
    {
        $this->brandPrcount = $brandPrcount;

        return $this;
    }

    /**
     * Get brandPrcount
     *
     * @return integer
     */
    public function getBrandPrcount()
    {
        return $this->brandPrcount;
    }

    /**
     * Set brandShopcount
     *
     * @param integer $brandShopcount
     *
     * @return Brands
     */
    public function setBrandShopcount($brandShopcount)
    {
        $this->brandShopcount = $brandShopcount;

        return $this;
    }

    /**
     * Get brandShopcount
     *
     * @return integer
     */
    public function getBrandShopcount()
    {
        return $this->brandShopcount;
    }

    /**
     * Get brandId
     *
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }
}

