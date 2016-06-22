<?php

namespace AppBundle\Entity;

/**
 * BrandsImportConfig
 */
class BrandsImportConfig
{
    /**
     * @var integer
     */
    private $bicRuneverysecs = '0';

    /**
     * @var string
     */
    private $bicImporturl;

    /**
     * @var integer
     */
    private $bicAddtime = '0';

    /**
     * @var integer
     */
    private $bicLastmodified = '0';

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $bicBrand;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $bicProdcat;


    /**
     * Set bicRuneverysecs
     *
     * @param integer $bicRuneverysecs
     *
     * @return BrandsImportConfig
     */
    public function setBicRuneverysecs($bicRuneverysecs)
    {
        $this->bicRuneverysecs = $bicRuneverysecs;

        return $this;
    }

    /**
     * Get bicRuneverysecs
     *
     * @return integer
     */
    public function getBicRuneverysecs()
    {
        return $this->bicRuneverysecs;
    }

    /**
     * Set bicImporturl
     *
     * @param string $bicImporturl
     *
     * @return BrandsImportConfig
     */
    public function setBicImporturl($bicImporturl)
    {
        $this->bicImporturl = $bicImporturl;

        return $this;
    }

    /**
     * Get bicImporturl
     *
     * @return string
     */
    public function getBicImporturl()
    {
        return $this->bicImporturl;
    }

    /**
     * Set bicAddtime
     *
     * @param integer $bicAddtime
     *
     * @return BrandsImportConfig
     */
    public function setBicAddtime($bicAddtime)
    {
        $this->bicAddtime = $bicAddtime;

        return $this;
    }

    /**
     * Get bicAddtime
     *
     * @return integer
     */
    public function getBicAddtime()
    {
        return $this->bicAddtime;
    }

    /**
     * Set bicLastmodified
     *
     * @param integer $bicLastmodified
     *
     * @return BrandsImportConfig
     */
    public function setBicLastmodified($bicLastmodified)
    {
        $this->bicLastmodified = $bicLastmodified;

        return $this;
    }

    /**
     * Get bicLastmodified
     *
     * @return integer
     */
    public function getBicLastmodified()
    {
        return $this->bicLastmodified;
    }

    /**
     * Set bicBrand
     *
     * @param \AppBundle\Entity\Brands $bicBrand
     *
     * @return BrandsImportConfig
     */
    public function setBicBrand(\AppBundle\Entity\Brands $bicBrand)
    {
        $this->bicBrand = $bicBrand;

        return $this;
    }

    /**
     * Get bicBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBicBrand()
    {
        return $this->bicBrand;
    }

    /**
     * Set bicProdcat
     *
     * @param \AppBundle\Entity\Prodcat $bicProdcat
     *
     * @return BrandsImportConfig
     */
    public function setBicProdcat(\AppBundle\Entity\Prodcat $bicProdcat = null)
    {
        $this->bicProdcat = $bicProdcat;

        return $this;
    }

    /**
     * Get bicProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getBicProdcat()
    {
        return $this->bicProdcat;
    }
}

