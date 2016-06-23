<?php

namespace AppBundle\Entity;

/**
 * BrandsProdcatMapping
 */
class BrandsProdcatMapping
{
    /**
     * @var integer
     */
    private $bpmBrandProdcatId;

    /**
     * @var string
     */
    private $bpmBrandProdcatName;

    /**
     * @var integer
     */
    private $bpmAddtime;

    /**
     * @var integer
     */
    private $bpmLastmodified;

    /**
     * @var integer
     */
    private $bpmId;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $bpmMappedProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $bpmBrand;


    /**
     * Set bpmBrandProdcatId
     *
     * @param integer $bpmBrandProdcatId
     *
     * @return BrandsProdcatMapping
     */
    public function setBpmBrandProdcatId($bpmBrandProdcatId)
    {
        $this->bpmBrandProdcatId = $bpmBrandProdcatId;

        return $this;
    }

    /**
     * Get bpmBrandProdcatId
     *
     * @return integer
     */
    public function getBpmBrandProdcatId()
    {
        return $this->bpmBrandProdcatId;
    }

    /**
     * Set bpmBrandProdcatName
     *
     * @param string $bpmBrandProdcatName
     *
     * @return BrandsProdcatMapping
     */
    public function setBpmBrandProdcatName($bpmBrandProdcatName)
    {
        $this->bpmBrandProdcatName = $bpmBrandProdcatName;

        return $this;
    }

    /**
     * Get bpmBrandProdcatName
     *
     * @return string
     */
    public function getBpmBrandProdcatName()
    {
        return $this->bpmBrandProdcatName;
    }

    /**
     * Set bpmAddtime
     *
     * @param integer $bpmAddtime
     *
     * @return BrandsProdcatMapping
     */
    public function setBpmAddtime($bpmAddtime)
    {
        $this->bpmAddtime = $bpmAddtime;

        return $this;
    }

    /**
     * Get bpmAddtime
     *
     * @return integer
     */
    public function getBpmAddtime()
    {
        return $this->bpmAddtime;
    }

    /**
     * Set bpmLastmodified
     *
     * @param integer $bpmLastmodified
     *
     * @return BrandsProdcatMapping
     */
    public function setBpmLastmodified($bpmLastmodified)
    {
        $this->bpmLastmodified = $bpmLastmodified;

        return $this;
    }

    /**
     * Get bpmLastmodified
     *
     * @return integer
     */
    public function getBpmLastmodified()
    {
        return $this->bpmLastmodified;
    }

    /**
     * Get bpmId
     *
     * @return integer
     */
    public function getBpmId()
    {
        return $this->bpmId;
    }

    /**
     * Set bpmMappedProdcat
     *
     * @param \AppBundle\Entity\Prodcat $bpmMappedProdcat
     *
     * @return BrandsProdcatMapping
     */
    public function setBpmMappedProdcat(\AppBundle\Entity\Prodcat $bpmMappedProdcat = null)
    {
        $this->bpmMappedProdcat = $bpmMappedProdcat;

        return $this;
    }

    /**
     * Get bpmMappedProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getBpmMappedProdcat()
    {
        return $this->bpmMappedProdcat;
    }

    /**
     * Set bpmBrand
     *
     * @param \AppBundle\Entity\Brands $bpmBrand
     *
     * @return BrandsProdcatMapping
     */
    public function setBpmBrand(\AppBundle\Entity\Brands $bpmBrand = null)
    {
        $this->bpmBrand = $bpmBrand;

        return $this;
    }

    /**
     * Get bpmBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBpmBrand()
    {
        return $this->bpmBrand;
    }
}
