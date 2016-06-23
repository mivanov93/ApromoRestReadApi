<?php

namespace AppBundle\Entity;

/**
 * BrandsUsers
 */
class BrandsUsers
{
    /**
     * @var string
     */
    private $buEmail;

    /**
     * @var string
     */
    private $buName;

    /**
     * @var string
     */
    private $buPasshash;

    /**
     * @var boolean
     */
    private $buActive = '1';

    /**
     * @var integer
     */
    private $buAddtime;

    /**
     * @var integer
     */
    private $buLastmodified;

    /**
     * @var integer
     */
    private $buId;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $buBrand;

    /**
     * @var \AppBundle\Entity\BrandsUsersRoles
     */
    private $buLevel;


    /**
     * Set buEmail
     *
     * @param string $buEmail
     *
     * @return BrandsUsers
     */
    public function setBuEmail($buEmail)
    {
        $this->buEmail = $buEmail;

        return $this;
    }

    /**
     * Get buEmail
     *
     * @return string
     */
    public function getBuEmail()
    {
        return $this->buEmail;
    }

    /**
     * Set buName
     *
     * @param string $buName
     *
     * @return BrandsUsers
     */
    public function setBuName($buName)
    {
        $this->buName = $buName;

        return $this;
    }

    /**
     * Get buName
     *
     * @return string
     */
    public function getBuName()
    {
        return $this->buName;
    }

    /**
     * Set buPasshash
     *
     * @param string $buPasshash
     *
     * @return BrandsUsers
     */
    public function setBuPasshash($buPasshash)
    {
        $this->buPasshash = $buPasshash;

        return $this;
    }

    /**
     * Get buPasshash
     *
     * @return string
     */
    public function getBuPasshash()
    {
        return $this->buPasshash;
    }

    /**
     * Set buActive
     *
     * @param boolean $buActive
     *
     * @return BrandsUsers
     */
    public function setBuActive($buActive)
    {
        $this->buActive = $buActive;

        return $this;
    }

    /**
     * Get buActive
     *
     * @return boolean
     */
    public function getBuActive()
    {
        return $this->buActive;
    }

    /**
     * Set buAddtime
     *
     * @param integer $buAddtime
     *
     * @return BrandsUsers
     */
    public function setBuAddtime($buAddtime)
    {
        $this->buAddtime = $buAddtime;

        return $this;
    }

    /**
     * Get buAddtime
     *
     * @return integer
     */
    public function getBuAddtime()
    {
        return $this->buAddtime;
    }

    /**
     * Set buLastmodified
     *
     * @param integer $buLastmodified
     *
     * @return BrandsUsers
     */
    public function setBuLastmodified($buLastmodified)
    {
        $this->buLastmodified = $buLastmodified;

        return $this;
    }

    /**
     * Get buLastmodified
     *
     * @return integer
     */
    public function getBuLastmodified()
    {
        return $this->buLastmodified;
    }

    /**
     * Get buId
     *
     * @return integer
     */
    public function getBuId()
    {
        return $this->buId;
    }

    /**
     * Set buBrand
     *
     * @param \AppBundle\Entity\Brands $buBrand
     *
     * @return BrandsUsers
     */
    public function setBuBrand(\AppBundle\Entity\Brands $buBrand = null)
    {
        $this->buBrand = $buBrand;

        return $this;
    }

    /**
     * Get buBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBuBrand()
    {
        return $this->buBrand;
    }

    /**
     * Set buLevel
     *
     * @param \AppBundle\Entity\BrandsUsersRoles $buLevel
     *
     * @return BrandsUsers
     */
    public function setBuLevel(\AppBundle\Entity\BrandsUsersRoles $buLevel = null)
    {
        $this->buLevel = $buLevel;

        return $this;
    }

    /**
     * Get buLevel
     *
     * @return \AppBundle\Entity\BrandsUsersRoles
     */
    public function getBuLevel()
    {
        return $this->buLevel;
    }
}
