<?php

namespace AppBundle\Entity;

/**
 * ProdcatMapping
 */
class ProdcatMapping
{
    /**
     * @var string
     */
    private $pmProdcatName;

    /**
     * @var integer
     */
    private $pmAddtime;

    /**
     * @var integer
     */
    private $pmLastmodified;

    /**
     * @var integer
     */
    private $pmId;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $pmMappedProdcat;


    /**
     * Set pmProdcatName
     *
     * @param string $pmProdcatName
     *
     * @return ProdcatMapping
     */
    public function setPmProdcatName($pmProdcatName)
    {
        $this->pmProdcatName = $pmProdcatName;

        return $this;
    }

    /**
     * Get pmProdcatName
     *
     * @return string
     */
    public function getPmProdcatName()
    {
        return $this->pmProdcatName;
    }

    /**
     * Set pmAddtime
     *
     * @param integer $pmAddtime
     *
     * @return ProdcatMapping
     */
    public function setPmAddtime($pmAddtime)
    {
        $this->pmAddtime = $pmAddtime;

        return $this;
    }

    /**
     * Get pmAddtime
     *
     * @return integer
     */
    public function getPmAddtime()
    {
        return $this->pmAddtime;
    }

    /**
     * Set pmLastmodified
     *
     * @param integer $pmLastmodified
     *
     * @return ProdcatMapping
     */
    public function setPmLastmodified($pmLastmodified)
    {
        $this->pmLastmodified = $pmLastmodified;

        return $this;
    }

    /**
     * Get pmLastmodified
     *
     * @return integer
     */
    public function getPmLastmodified()
    {
        return $this->pmLastmodified;
    }

    /**
     * Get pmId
     *
     * @return integer
     */
    public function getPmId()
    {
        return $this->pmId;
    }

    /**
     * Set pmMappedProdcat
     *
     * @param \AppBundle\Entity\Prodcat $pmMappedProdcat
     *
     * @return ProdcatMapping
     */
    public function setPmMappedProdcat(\AppBundle\Entity\Prodcat $pmMappedProdcat = null)
    {
        $this->pmMappedProdcat = $pmMappedProdcat;

        return $this;
    }

    /**
     * Get pmMappedProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getPmMappedProdcat()
    {
        return $this->pmMappedProdcat;
    }
}

