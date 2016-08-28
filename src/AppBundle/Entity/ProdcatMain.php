<?php

namespace AppBundle\Entity;

/**
 * ProdcatMain
 */
class ProdcatMain
{
    /**
     * @var string
     */
    private $pmName;

    /**
     * @var string
     */
    private $pmDescr;

    /**
     * @var integer
     */
    private $pmAddtime = '0';

    /**
     * @var integer
     */
    private $pmLastmodified = '0';

    /**
     * @var integer
     */
    private $pmId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pmProdcatCollection;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pmProdcatCollection = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set pmName
     *
     * @param string $pmName
     *
     * @return ProdcatMain
     */
    public function setPmName($pmName)
    {
        $this->pmName = $pmName;

        return $this;
    }

    /**
     * Get pmName
     *
     * @return string
     */
    public function getPmName()
    {
        return $this->pmName;
    }

    /**
     * Set pmDescr
     *
     * @param string $pmDescr
     *
     * @return ProdcatMain
     */
    public function setPmDescr($pmDescr)
    {
        $this->pmDescr = $pmDescr;

        return $this;
    }

    /**
     * Get pmDescr
     *
     * @return string
     */
    public function getPmDescr()
    {
        return $this->pmDescr;
    }

    /**
     * Set pmAddtime
     *
     * @param integer $pmAddtime
     *
     * @return ProdcatMain
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
     * @return ProdcatMain
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
     * Add pmProdcatCollection
     *
     * @param \AppBundle\Entity\Prodcat $pmProdcatCollection
     *
     * @return ProdcatMain
     */
    public function addPmProdcatCollection(\AppBundle\Entity\Prodcat $pmProdcatCollection)
    {
        $this->pmProdcatCollection[] = $pmProdcatCollection;

        return $this;
    }

    /**
     * Remove pmProdcatCollection
     *
     * @param \AppBundle\Entity\Prodcat $pmProdcatCollection
     */
    public function removePmProdcatCollection(\AppBundle\Entity\Prodcat $pmProdcatCollection)
    {
        $this->pmProdcatCollection->removeElement($pmProdcatCollection);
    }

    /**
     * Get pmProdcatCollection
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPmProdcatCollection()
    {
        return $this->pmProdcatCollection;
    }
}
