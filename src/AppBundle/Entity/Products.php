<?php

namespace AppBundle\Entity;

/**
 * Products
 */
class Products
{
    /**
     * @var string
     */
    private $prodName;

    /**
     * @var string
     */
    private $prodDescr;

    /**
     * @var string
     */
    private $prodUrl;

    /**
     * @var boolean
     */
    private $prodLimitedAvail = '0';

    /**
     * @var float
     */
    private $prodOldprice;

    /**
     * @var float
     */
    private $prodNewprice;

    /**
     * @var integer
     */
    private $prodPercentage;

    /**
     * @var integer
     */
    private $prodDeliveryTime = '0';

    /**
     * @var float
     */
    private $prodDeliveryCost = '0.00';

    /**
     * @var string
     */
    private $prodManufacturer = '';

    /**
     * @var string
     */
    private $prodMpn = '';

    /**
     * @var integer
     */
    private $prodBarcode = '0';

    /**
     * @var integer
     */
    private $prodAddtime = '0';

    /**
     * @var integer
     */
    private $prodLastmodified = '0';

    /**
     * @var integer
     */
    private $prodValidfrom = '0';

    /**
     * @var integer
     */
    private $prodExptime = '0';

    /**
     * @var boolean
     */
    private $prodActive = '1';

    /**
     * @var boolean
     */
    private $prodTop = '0';

    /**
     * @var string
     */
    private $prodUniqueId;

    /**
     * @var integer
     */
    private $prodId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prodPiCollection;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $prodProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $prodBrand;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prodPiCollection = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set prodName
     *
     * @param string $prodName
     *
     * @return Products
     */
    public function setProdName($prodName)
    {
        $this->prodName = $prodName;

        return $this;
    }

    /**
     * Get prodName
     *
     * @return string
     */
    public function getProdName()
    {
        return $this->prodName;
    }

    /**
     * Set prodDescr
     *
     * @param string $prodDescr
     *
     * @return Products
     */
    public function setProdDescr($prodDescr)
    {
        $this->prodDescr = $prodDescr;

        return $this;
    }

    /**
     * Get prodDescr
     *
     * @return string
     */
    public function getProdDescr()
    {
        return $this->prodDescr;
    }

    /**
     * Set prodUrl
     *
     * @param string $prodUrl
     *
     * @return Products
     */
    public function setProdUrl($prodUrl)
    {
        $this->prodUrl = $prodUrl;

        return $this;
    }

    /**
     * Get prodUrl
     *
     * @return string
     */
    public function getProdUrl()
    {
        return $this->prodUrl;
    }

    /**
     * Set prodLimitedAvail
     *
     * @param boolean $prodLimitedAvail
     *
     * @return Products
     */
    public function setProdLimitedAvail($prodLimitedAvail)
    {
        $this->prodLimitedAvail = $prodLimitedAvail;

        return $this;
    }

    /**
     * Get prodLimitedAvail
     *
     * @return boolean
     */
    public function getProdLimitedAvail()
    {
        return $this->prodLimitedAvail;
    }

    /**
     * Set prodOldprice
     *
     * @param float $prodOldprice
     *
     * @return Products
     */
    public function setProdOldprice($prodOldprice)
    {
        $this->prodOldprice = $prodOldprice;

        return $this;
    }

    /**
     * Get prodOldprice
     *
     * @return float
     */
    public function getProdOldprice()
    {
        return $this->prodOldprice;
    }

    /**
     * Set prodNewprice
     *
     * @param float $prodNewprice
     *
     * @return Products
     */
    public function setProdNewprice($prodNewprice)
    {
        $this->prodNewprice = $prodNewprice;

        return $this;
    }

    /**
     * Get prodNewprice
     *
     * @return float
     */
    public function getProdNewprice()
    {
        return $this->prodNewprice;
    }

    /**
     * Set prodPercentage
     *
     * @param integer $prodPercentage
     *
     * @return Products
     */
    public function setProdPercentage($prodPercentage)
    {
        $this->prodPercentage = $prodPercentage;

        return $this;
    }

    /**
     * Get prodPercentage
     *
     * @return integer
     */
    public function getProdPercentage()
    {
        return $this->prodPercentage;
    }

    /**
     * Set prodDeliveryTime
     *
     * @param integer $prodDeliveryTime
     *
     * @return Products
     */
    public function setProdDeliveryTime($prodDeliveryTime)
    {
        $this->prodDeliveryTime = $prodDeliveryTime;

        return $this;
    }

    /**
     * Get prodDeliveryTime
     *
     * @return integer
     */
    public function getProdDeliveryTime()
    {
        return $this->prodDeliveryTime;
    }

    /**
     * Set prodDeliveryCost
     *
     * @param float $prodDeliveryCost
     *
     * @return Products
     */
    public function setProdDeliveryCost($prodDeliveryCost)
    {
        $this->prodDeliveryCost = $prodDeliveryCost;

        return $this;
    }

    /**
     * Get prodDeliveryCost
     *
     * @return float
     */
    public function getProdDeliveryCost()
    {
        return $this->prodDeliveryCost;
    }

    /**
     * Set prodManufacturer
     *
     * @param string $prodManufacturer
     *
     * @return Products
     */
    public function setProdManufacturer($prodManufacturer)
    {
        $this->prodManufacturer = $prodManufacturer;

        return $this;
    }

    /**
     * Get prodManufacturer
     *
     * @return string
     */
    public function getProdManufacturer()
    {
        return $this->prodManufacturer;
    }

    /**
     * Set prodMpn
     *
     * @param string $prodMpn
     *
     * @return Products
     */
    public function setProdMpn($prodMpn)
    {
        $this->prodMpn = $prodMpn;

        return $this;
    }

    /**
     * Get prodMpn
     *
     * @return string
     */
    public function getProdMpn()
    {
        return $this->prodMpn;
    }

    /**
     * Set prodBarcode
     *
     * @param integer $prodBarcode
     *
     * @return Products
     */
    public function setProdBarcode($prodBarcode)
    {
        $this->prodBarcode = $prodBarcode;

        return $this;
    }

    /**
     * Get prodBarcode
     *
     * @return integer
     */
    public function getProdBarcode()
    {
        return $this->prodBarcode;
    }

    /**
     * Set prodAddtime
     *
     * @param integer $prodAddtime
     *
     * @return Products
     */
    public function setProdAddtime($prodAddtime)
    {
        $this->prodAddtime = $prodAddtime;

        return $this;
    }

    /**
     * Get prodAddtime
     *
     * @return integer
     */
    public function getProdAddtime()
    {
        return $this->prodAddtime;
    }

    /**
     * Set prodLastmodified
     *
     * @param integer $prodLastmodified
     *
     * @return Products
     */
    public function setProdLastmodified($prodLastmodified)
    {
        $this->prodLastmodified = $prodLastmodified;

        return $this;
    }

    /**
     * Get prodLastmodified
     *
     * @return integer
     */
    public function getProdLastmodified()
    {
        return $this->prodLastmodified;
    }

    /**
     * Set prodValidfrom
     *
     * @param integer $prodValidfrom
     *
     * @return Products
     */
    public function setProdValidfrom($prodValidfrom)
    {
        $this->prodValidfrom = $prodValidfrom;

        return $this;
    }

    /**
     * Get prodValidfrom
     *
     * @return integer
     */
    public function getProdValidfrom()
    {
        return $this->prodValidfrom;
    }

    /**
     * Set prodExptime
     *
     * @param integer $prodExptime
     *
     * @return Products
     */
    public function setProdExptime($prodExptime)
    {
        $this->prodExptime = $prodExptime;

        return $this;
    }

    /**
     * Get prodExptime
     *
     * @return integer
     */
    public function getProdExptime()
    {
        return $this->prodExptime;
    }

    /**
     * Set prodActive
     *
     * @param boolean $prodActive
     *
     * @return Products
     */
    public function setProdActive($prodActive)
    {
        $this->prodActive = $prodActive;

        return $this;
    }

    /**
     * Get prodActive
     *
     * @return boolean
     */
    public function getProdActive()
    {
        return $this->prodActive;
    }

    /**
     * Set prodTop
     *
     * @param boolean $prodTop
     *
     * @return Products
     */
    public function setProdTop($prodTop)
    {
        $this->prodTop = $prodTop;

        return $this;
    }

    /**
     * Get prodTop
     *
     * @return boolean
     */
    public function getProdTop()
    {
        return $this->prodTop;
    }

    /**
     * Set prodUniqueId
     *
     * @param string $prodUniqueId
     *
     * @return Products
     */
    public function setProdUniqueId($prodUniqueId)
    {
        $this->prodUniqueId = $prodUniqueId;

        return $this;
    }

    /**
     * Get prodUniqueId
     *
     * @return string
     */
    public function getProdUniqueId()
    {
        return $this->prodUniqueId;
    }

    /**
     * Get prodId
     *
     * @return integer
     */
    public function getProdId()
    {
        return $this->prodId;
    }

    /**
     * Add prodPiCollection
     *
     * @param \AppBundle\Entity\ProductsImages $prodPiCollection
     *
     * @return Products
     */
    public function addProdPiCollection(\AppBundle\Entity\ProductsImages $prodPiCollection)
    {
        $this->prodPiCollection[] = $prodPiCollection;

        return $this;
    }

    /**
     * Remove prodPiCollection
     *
     * @param \AppBundle\Entity\ProductsImages $prodPiCollection
     */
    public function removeProdPiCollection(\AppBundle\Entity\ProductsImages $prodPiCollection)
    {
        $this->prodPiCollection->removeElement($prodPiCollection);
    }

    /**
     * Get prodPiCollection
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProdPiCollection()
    {
        return $this->prodPiCollection;
    }

    /**
     * Set prodProdcat
     *
     * @param \AppBundle\Entity\Prodcat $prodProdcat
     *
     * @return Products
     */
    public function setProdProdcat(\AppBundle\Entity\Prodcat $prodProdcat = null)
    {
        $this->prodProdcat = $prodProdcat;

        return $this;
    }

    /**
     * Get prodProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getProdProdcat()
    {
        return $this->prodProdcat;
    }

    /**
     * Set prodBrand
     *
     * @param \AppBundle\Entity\Brands $prodBrand
     *
     * @return Products
     */
    public function setProdBrand(\AppBundle\Entity\Brands $prodBrand = null)
    {
        $this->prodBrand = $prodBrand;

        return $this;
    }

    /**
     * Get prodBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getProdBrand()
    {
        return $this->prodBrand;
    }
}

