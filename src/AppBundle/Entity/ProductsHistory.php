<?php

namespace AppBundle\Entity;

/**
 * ProductsHistory
 */
class ProductsHistory
{
    /**
     * @var integer
     */
    private $phProdId;

    /**
     * @var string
     */
    private $phProdName;

    /**
     * @var string
     */
    private $phProdUrl;

    /**
     * @var string
     */
    private $phProdDescr;

    /**
     * @var boolean
     */
    private $phProdTop;

    /**
     * @var boolean
     */
    private $phProdLimitedAvail;

    /**
     * @var float
     */
    private $phProdNewprice;

    /**
     * @var float
     */
    private $phProdOldprice;

    /**
     * @var integer
     */
    private $phProdPercentage;

    /**
     * @var integer
     */
    private $phProdValidfrom;

    /**
     * @var integer
     */
    private $phProdExptime;

    /**
     * @var integer
     */
    private $phAddtime;

    /**
     * @var integer
     */
    private $phId;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $phProdProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $phProdBrand;


    /**
     * Set phProdId
     *
     * @param integer $phProdId
     *
     * @return ProductsHistory
     */
    public function setPhProdId($phProdId)
    {
        $this->phProdId = $phProdId;

        return $this;
    }

    /**
     * Get phProdId
     *
     * @return integer
     */
    public function getPhProdId()
    {
        return $this->phProdId;
    }

    /**
     * Set phProdName
     *
     * @param string $phProdName
     *
     * @return ProductsHistory
     */
    public function setPhProdName($phProdName)
    {
        $this->phProdName = $phProdName;

        return $this;
    }

    /**
     * Get phProdName
     *
     * @return string
     */
    public function getPhProdName()
    {
        return $this->phProdName;
    }

    /**
     * Set phProdUrl
     *
     * @param string $phProdUrl
     *
     * @return ProductsHistory
     */
    public function setPhProdUrl($phProdUrl)
    {
        $this->phProdUrl = $phProdUrl;

        return $this;
    }

    /**
     * Get phProdUrl
     *
     * @return string
     */
    public function getPhProdUrl()
    {
        return $this->phProdUrl;
    }

    /**
     * Set phProdDescr
     *
     * @param string $phProdDescr
     *
     * @return ProductsHistory
     */
    public function setPhProdDescr($phProdDescr)
    {
        $this->phProdDescr = $phProdDescr;

        return $this;
    }

    /**
     * Get phProdDescr
     *
     * @return string
     */
    public function getPhProdDescr()
    {
        return $this->phProdDescr;
    }

    /**
     * Set phProdTop
     *
     * @param boolean $phProdTop
     *
     * @return ProductsHistory
     */
    public function setPhProdTop($phProdTop)
    {
        $this->phProdTop = $phProdTop;

        return $this;
    }

    /**
     * Get phProdTop
     *
     * @return boolean
     */
    public function getPhProdTop()
    {
        return $this->phProdTop;
    }

    /**
     * Set phProdLimitedAvail
     *
     * @param boolean $phProdLimitedAvail
     *
     * @return ProductsHistory
     */
    public function setPhProdLimitedAvail($phProdLimitedAvail)
    {
        $this->phProdLimitedAvail = $phProdLimitedAvail;

        return $this;
    }

    /**
     * Get phProdLimitedAvail
     *
     * @return boolean
     */
    public function getPhProdLimitedAvail()
    {
        return $this->phProdLimitedAvail;
    }

    /**
     * Set phProdNewprice
     *
     * @param float $phProdNewprice
     *
     * @return ProductsHistory
     */
    public function setPhProdNewprice($phProdNewprice)
    {
        $this->phProdNewprice = $phProdNewprice;

        return $this;
    }

    /**
     * Get phProdNewprice
     *
     * @return float
     */
    public function getPhProdNewprice()
    {
        return $this->phProdNewprice;
    }

    /**
     * Set phProdOldprice
     *
     * @param float $phProdOldprice
     *
     * @return ProductsHistory
     */
    public function setPhProdOldprice($phProdOldprice)
    {
        $this->phProdOldprice = $phProdOldprice;

        return $this;
    }

    /**
     * Get phProdOldprice
     *
     * @return float
     */
    public function getPhProdOldprice()
    {
        return $this->phProdOldprice;
    }

    /**
     * Set phProdPercentage
     *
     * @param integer $phProdPercentage
     *
     * @return ProductsHistory
     */
    public function setPhProdPercentage($phProdPercentage)
    {
        $this->phProdPercentage = $phProdPercentage;

        return $this;
    }

    /**
     * Get phProdPercentage
     *
     * @return integer
     */
    public function getPhProdPercentage()
    {
        return $this->phProdPercentage;
    }

    /**
     * Set phProdValidfrom
     *
     * @param integer $phProdValidfrom
     *
     * @return ProductsHistory
     */
    public function setPhProdValidfrom($phProdValidfrom)
    {
        $this->phProdValidfrom = $phProdValidfrom;

        return $this;
    }

    /**
     * Get phProdValidfrom
     *
     * @return integer
     */
    public function getPhProdValidfrom()
    {
        return $this->phProdValidfrom;
    }

    /**
     * Set phProdExptime
     *
     * @param integer $phProdExptime
     *
     * @return ProductsHistory
     */
    public function setPhProdExptime($phProdExptime)
    {
        $this->phProdExptime = $phProdExptime;

        return $this;
    }

    /**
     * Get phProdExptime
     *
     * @return integer
     */
    public function getPhProdExptime()
    {
        return $this->phProdExptime;
    }

    /**
     * Set phAddtime
     *
     * @param integer $phAddtime
     *
     * @return ProductsHistory
     */
    public function setPhAddtime($phAddtime)
    {
        $this->phAddtime = $phAddtime;

        return $this;
    }

    /**
     * Get phAddtime
     *
     * @return integer
     */
    public function getPhAddtime()
    {
        return $this->phAddtime;
    }

    /**
     * Get phId
     *
     * @return integer
     */
    public function getPhId()
    {
        return $this->phId;
    }

    /**
     * Set phProdProdcat
     *
     * @param \AppBundle\Entity\Prodcat $phProdProdcat
     *
     * @return ProductsHistory
     */
    public function setPhProdProdcat(\AppBundle\Entity\Prodcat $phProdProdcat = null)
    {
        $this->phProdProdcat = $phProdProdcat;

        return $this;
    }

    /**
     * Get phProdProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getPhProdProdcat()
    {
        return $this->phProdProdcat;
    }

    /**
     * Set phProdBrand
     *
     * @param \AppBundle\Entity\Brands $phProdBrand
     *
     * @return ProductsHistory
     */
    public function setPhProdBrand(\AppBundle\Entity\Brands $phProdBrand = null)
    {
        $this->phProdBrand = $phProdBrand;

        return $this;
    }

    /**
     * Get phProdBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getPhProdBrand()
    {
        return $this->phProdBrand;
    }
}
