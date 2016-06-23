<?php

namespace AppBundle\Entity;

/**
 * BrandsPrivate
 */
class BrandsPrivate
{
    /**
     * @var integer
     */
    private $bpMaxPrCount = '200';

    /**
     * @var integer
     */
    private $bpMaxTopPrCount = '5';

    /**
     * @var integer
     */
    private $bpAddtime;

    /**
     * @var integer
     */
    private $bpLastmodified;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $bpBrand;


    /**
     * Set bpMaxPrCount
     *
     * @param integer $bpMaxPrCount
     *
     * @return BrandsPrivate
     */
    public function setBpMaxPrCount($bpMaxPrCount)
    {
        $this->bpMaxPrCount = $bpMaxPrCount;

        return $this;
    }

    /**
     * Get bpMaxPrCount
     *
     * @return integer
     */
    public function getBpMaxPrCount()
    {
        return $this->bpMaxPrCount;
    }

    /**
     * Set bpMaxTopPrCount
     *
     * @param integer $bpMaxTopPrCount
     *
     * @return BrandsPrivate
     */
    public function setBpMaxTopPrCount($bpMaxTopPrCount)
    {
        $this->bpMaxTopPrCount = $bpMaxTopPrCount;

        return $this;
    }

    /**
     * Get bpMaxTopPrCount
     *
     * @return integer
     */
    public function getBpMaxTopPrCount()
    {
        return $this->bpMaxTopPrCount;
    }

    /**
     * Set bpAddtime
     *
     * @param integer $bpAddtime
     *
     * @return BrandsPrivate
     */
    public function setBpAddtime($bpAddtime)
    {
        $this->bpAddtime = $bpAddtime;

        return $this;
    }

    /**
     * Get bpAddtime
     *
     * @return integer
     */
    public function getBpAddtime()
    {
        return $this->bpAddtime;
    }

    /**
     * Set bpLastmodified
     *
     * @param integer $bpLastmodified
     *
     * @return BrandsPrivate
     */
    public function setBpLastmodified($bpLastmodified)
    {
        $this->bpLastmodified = $bpLastmodified;

        return $this;
    }

    /**
     * Get bpLastmodified
     *
     * @return integer
     */
    public function getBpLastmodified()
    {
        return $this->bpLastmodified;
    }

    /**
     * Set bpBrand
     *
     * @param \AppBundle\Entity\Brands $bpBrand
     *
     * @return BrandsPrivate
     */
    public function setBpBrand(\AppBundle\Entity\Brands $bpBrand)
    {
        $this->bpBrand = $bpBrand;

        return $this;
    }

    /**
     * Get bpBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBpBrand()
    {
        return $this->bpBrand;
    }
}
