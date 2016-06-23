<?php

namespace AppBundle\Entity;

/**
 * ProductsArchive
 */
class ProductsArchive
{
    /**
     * @var integer
     */
    private $paAddtime;

    /**
     * @var integer
     */
    private $paProdId;

    /**
     * @var string
     */
    private $paProdName;

    /**
     * @var string
     */
    private $paProdDescr;

    /**
     * @var string
     */
    private $paProdUrl;

    /**
     * @var boolean
     */
    private $paProdLimitedAvail = '0';

    /**
     * @var float
     */
    private $paProdOldprice;

    /**
     * @var float
     */
    private $paProdNewprice;

    /**
     * @var integer
     */
    private $paProdPercentage;

    /**
     * @var integer
     */
    private $paProdAddtime = '0';

    /**
     * @var integer
     */
    private $paProdLastmodified = '0';

    /**
     * @var integer
     */
    private $paProdValidfrom = '0';

    /**
     * @var integer
     */
    private $paProdExptime = '0';

    /**
     * @var boolean
     */
    private $paProdActive = '1';

    /**
     * @var boolean
     */
    private $paProdTop = '0';

    /**
     * @var integer
     */
    private $paProdUniqueId;

    /**
     * @var integer
     */
    private $paId;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $paProdProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $paProdBrand;


    /**
     * Set paAddtime
     *
     * @param integer $paAddtime
     *
     * @return ProductsArchive
     */
    public function setPaAddtime($paAddtime)
    {
        $this->paAddtime = $paAddtime;

        return $this;
    }

    /**
     * Get paAddtime
     *
     * @return integer
     */
    public function getPaAddtime()
    {
        return $this->paAddtime;
    }

    /**
     * Set paProdId
     *
     * @param integer $paProdId
     *
     * @return ProductsArchive
     */
    public function setPaProdId($paProdId)
    {
        $this->paProdId = $paProdId;

        return $this;
    }

    /**
     * Get paProdId
     *
     * @return integer
     */
    public function getPaProdId()
    {
        return $this->paProdId;
    }

    /**
     * Set paProdName
     *
     * @param string $paProdName
     *
     * @return ProductsArchive
     */
    public function setPaProdName($paProdName)
    {
        $this->paProdName = $paProdName;

        return $this;
    }

    /**
     * Get paProdName
     *
     * @return string
     */
    public function getPaProdName()
    {
        return $this->paProdName;
    }

    /**
     * Set paProdDescr
     *
     * @param string $paProdDescr
     *
     * @return ProductsArchive
     */
    public function setPaProdDescr($paProdDescr)
    {
        $this->paProdDescr = $paProdDescr;

        return $this;
    }

    /**
     * Get paProdDescr
     *
     * @return string
     */
    public function getPaProdDescr()
    {
        return $this->paProdDescr;
    }

    /**
     * Set paProdUrl
     *
     * @param string $paProdUrl
     *
     * @return ProductsArchive
     */
    public function setPaProdUrl($paProdUrl)
    {
        $this->paProdUrl = $paProdUrl;

        return $this;
    }

    /**
     * Get paProdUrl
     *
     * @return string
     */
    public function getPaProdUrl()
    {
        return $this->paProdUrl;
    }

    /**
     * Set paProdLimitedAvail
     *
     * @param boolean $paProdLimitedAvail
     *
     * @return ProductsArchive
     */
    public function setPaProdLimitedAvail($paProdLimitedAvail)
    {
        $this->paProdLimitedAvail = $paProdLimitedAvail;

        return $this;
    }

    /**
     * Get paProdLimitedAvail
     *
     * @return boolean
     */
    public function getPaProdLimitedAvail()
    {
        return $this->paProdLimitedAvail;
    }

    /**
     * Set paProdOldprice
     *
     * @param float $paProdOldprice
     *
     * @return ProductsArchive
     */
    public function setPaProdOldprice($paProdOldprice)
    {
        $this->paProdOldprice = $paProdOldprice;

        return $this;
    }

    /**
     * Get paProdOldprice
     *
     * @return float
     */
    public function getPaProdOldprice()
    {
        return $this->paProdOldprice;
    }

    /**
     * Set paProdNewprice
     *
     * @param float $paProdNewprice
     *
     * @return ProductsArchive
     */
    public function setPaProdNewprice($paProdNewprice)
    {
        $this->paProdNewprice = $paProdNewprice;

        return $this;
    }

    /**
     * Get paProdNewprice
     *
     * @return float
     */
    public function getPaProdNewprice()
    {
        return $this->paProdNewprice;
    }

    /**
     * Set paProdPercentage
     *
     * @param integer $paProdPercentage
     *
     * @return ProductsArchive
     */
    public function setPaProdPercentage($paProdPercentage)
    {
        $this->paProdPercentage = $paProdPercentage;

        return $this;
    }

    /**
     * Get paProdPercentage
     *
     * @return integer
     */
    public function getPaProdPercentage()
    {
        return $this->paProdPercentage;
    }

    /**
     * Set paProdAddtime
     *
     * @param integer $paProdAddtime
     *
     * @return ProductsArchive
     */
    public function setPaProdAddtime($paProdAddtime)
    {
        $this->paProdAddtime = $paProdAddtime;

        return $this;
    }

    /**
     * Get paProdAddtime
     *
     * @return integer
     */
    public function getPaProdAddtime()
    {
        return $this->paProdAddtime;
    }

    /**
     * Set paProdLastmodified
     *
     * @param integer $paProdLastmodified
     *
     * @return ProductsArchive
     */
    public function setPaProdLastmodified($paProdLastmodified)
    {
        $this->paProdLastmodified = $paProdLastmodified;

        return $this;
    }

    /**
     * Get paProdLastmodified
     *
     * @return integer
     */
    public function getPaProdLastmodified()
    {
        return $this->paProdLastmodified;
    }

    /**
     * Set paProdValidfrom
     *
     * @param integer $paProdValidfrom
     *
     * @return ProductsArchive
     */
    public function setPaProdValidfrom($paProdValidfrom)
    {
        $this->paProdValidfrom = $paProdValidfrom;

        return $this;
    }

    /**
     * Get paProdValidfrom
     *
     * @return integer
     */
    public function getPaProdValidfrom()
    {
        return $this->paProdValidfrom;
    }

    /**
     * Set paProdExptime
     *
     * @param integer $paProdExptime
     *
     * @return ProductsArchive
     */
    public function setPaProdExptime($paProdExptime)
    {
        $this->paProdExptime = $paProdExptime;

        return $this;
    }

    /**
     * Get paProdExptime
     *
     * @return integer
     */
    public function getPaProdExptime()
    {
        return $this->paProdExptime;
    }

    /**
     * Set paProdActive
     *
     * @param boolean $paProdActive
     *
     * @return ProductsArchive
     */
    public function setPaProdActive($paProdActive)
    {
        $this->paProdActive = $paProdActive;

        return $this;
    }

    /**
     * Get paProdActive
     *
     * @return boolean
     */
    public function getPaProdActive()
    {
        return $this->paProdActive;
    }

    /**
     * Set paProdTop
     *
     * @param boolean $paProdTop
     *
     * @return ProductsArchive
     */
    public function setPaProdTop($paProdTop)
    {
        $this->paProdTop = $paProdTop;

        return $this;
    }

    /**
     * Get paProdTop
     *
     * @return boolean
     */
    public function getPaProdTop()
    {
        return $this->paProdTop;
    }

    /**
     * Set paProdUniqueId
     *
     * @param integer $paProdUniqueId
     *
     * @return ProductsArchive
     */
    public function setPaProdUniqueId($paProdUniqueId)
    {
        $this->paProdUniqueId = $paProdUniqueId;

        return $this;
    }

    /**
     * Get paProdUniqueId
     *
     * @return integer
     */
    public function getPaProdUniqueId()
    {
        return $this->paProdUniqueId;
    }

    /**
     * Get paId
     *
     * @return integer
     */
    public function getPaId()
    {
        return $this->paId;
    }

    /**
     * Set paProdProdcat
     *
     * @param \AppBundle\Entity\Prodcat $paProdProdcat
     *
     * @return ProductsArchive
     */
    public function setPaProdProdcat(\AppBundle\Entity\Prodcat $paProdProdcat = null)
    {
        $this->paProdProdcat = $paProdProdcat;

        return $this;
    }

    /**
     * Get paProdProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getPaProdProdcat()
    {
        return $this->paProdProdcat;
    }

    /**
     * Set paProdBrand
     *
     * @param \AppBundle\Entity\Brands $paProdBrand
     *
     * @return ProductsArchive
     */
    public function setPaProdBrand(\AppBundle\Entity\Brands $paProdBrand = null)
    {
        $this->paProdBrand = $paProdBrand;

        return $this;
    }

    /**
     * Get paProdBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getPaProdBrand()
    {
        return $this->paProdBrand;
    }
}
