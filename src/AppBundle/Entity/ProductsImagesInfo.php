<?php

namespace AppBundle\Entity;

/**
 * ProductsImagesInfo
 */
class ProductsImagesInfo
{
    /**
     * @var string
     */
    private $piiImageUrl;

    /**
     * @var integer
     */
    private $piiAddtime;

    /**
     * @var integer
     */
    private $piiLastmodified;

    /**
     * @var \AppBundle\Entity\ProductsImages
     */
    private $piiPi;


    /**
     * Set piiImageUrl
     *
     * @param string $piiImageUrl
     *
     * @return ProductsImagesInfo
     */
    public function setPiiImageUrl($piiImageUrl)
    {
        $this->piiImageUrl = $piiImageUrl;

        return $this;
    }

    /**
     * Get piiImageUrl
     *
     * @return string
     */
    public function getPiiImageUrl()
    {
        return $this->piiImageUrl;
    }

    /**
     * Set piiAddtime
     *
     * @param integer $piiAddtime
     *
     * @return ProductsImagesInfo
     */
    public function setPiiAddtime($piiAddtime)
    {
        $this->piiAddtime = $piiAddtime;

        return $this;
    }

    /**
     * Get piiAddtime
     *
     * @return integer
     */
    public function getPiiAddtime()
    {
        return $this->piiAddtime;
    }

    /**
     * Set piiLastmodified
     *
     * @param integer $piiLastmodified
     *
     * @return ProductsImagesInfo
     */
    public function setPiiLastmodified($piiLastmodified)
    {
        $this->piiLastmodified = $piiLastmodified;

        return $this;
    }

    /**
     * Get piiLastmodified
     *
     * @return integer
     */
    public function getPiiLastmodified()
    {
        return $this->piiLastmodified;
    }

    /**
     * Set piiPi
     *
     * @param \AppBundle\Entity\ProductsImages $piiPi
     *
     * @return ProductsImagesInfo
     */
    public function setPiiPi(\AppBundle\Entity\ProductsImages $piiPi)
    {
        $this->piiPi = $piiPi;

        return $this;
    }

    /**
     * Get piiPi
     *
     * @return \AppBundle\Entity\ProductsImages
     */
    public function getPiiPi()
    {
        return $this->piiPi;
    }
}
