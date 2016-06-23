<?php

namespace AppBundle\Entity;

/**
 * Prodcat
 */
class Prodcat
{
    /**
     * @var string
     */
    private $prodcatName;

    /**
     * @var string
     */
    private $prodcatDescr;

    /**
     * @var integer
     */
    private $prodcatAddtime = '0';

    /**
     * @var integer
     */
    private $prodcatLastmodified = '0';

    /**
     * @var integer
     */
    private $prodcatId;

    /**
     * @var \AppBundle\Entity\ProdcatLinkage
     */
    private $prodcatLinkage;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $prodcatPar;


    /**
     * Set prodcatName
     *
     * @param string $prodcatName
     *
     * @return Prodcat
     */
    public function setProdcatName($prodcatName)
    {
        $this->prodcatName = $prodcatName;

        return $this;
    }

    /**
     * Get prodcatName
     *
     * @return string
     */
    public function getProdcatName()
    {
        return $this->prodcatName;
    }

    /**
     * Set prodcatDescr
     *
     * @param string $prodcatDescr
     *
     * @return Prodcat
     */
    public function setProdcatDescr($prodcatDescr)
    {
        $this->prodcatDescr = $prodcatDescr;

        return $this;
    }

    /**
     * Get prodcatDescr
     *
     * @return string
     */
    public function getProdcatDescr()
    {
        return $this->prodcatDescr;
    }

    /**
     * Set prodcatAddtime
     *
     * @param integer $prodcatAddtime
     *
     * @return Prodcat
     */
    public function setProdcatAddtime($prodcatAddtime)
    {
        $this->prodcatAddtime = $prodcatAddtime;

        return $this;
    }

    /**
     * Get prodcatAddtime
     *
     * @return integer
     */
    public function getProdcatAddtime()
    {
        return $this->prodcatAddtime;
    }

    /**
     * Set prodcatLastmodified
     *
     * @param integer $prodcatLastmodified
     *
     * @return Prodcat
     */
    public function setProdcatLastmodified($prodcatLastmodified)
    {
        $this->prodcatLastmodified = $prodcatLastmodified;

        return $this;
    }

    /**
     * Get prodcatLastmodified
     *
     * @return integer
     */
    public function getProdcatLastmodified()
    {
        return $this->prodcatLastmodified;
    }

    /**
     * Get prodcatId
     *
     * @return integer
     */
    public function getProdcatId()
    {
        return $this->prodcatId;
    }

    /**
     * Set prodcatLinkage
     *
     * @param \AppBundle\Entity\ProdcatLinkage $prodcatLinkage
     *
     * @return Prodcat
     */
    public function setProdcatLinkage(\AppBundle\Entity\ProdcatLinkage $prodcatLinkage = null)
    {
        $this->prodcatLinkage = $prodcatLinkage;

        return $this;
    }

    /**
     * Get prodcatLinkage
     *
     * @return \AppBundle\Entity\ProdcatLinkage
     */
    public function getProdcatLinkage()
    {
        return $this->prodcatLinkage;
    }

    /**
     * Set prodcatPar
     *
     * @param \AppBundle\Entity\Prodcat $prodcatPar
     *
     * @return Prodcat
     */
    public function setProdcatPar(\AppBundle\Entity\Prodcat $prodcatPar = null)
    {
        $this->prodcatPar = $prodcatPar;

        return $this;
    }

    /**
     * Get prodcatPar
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getProdcatPar()
    {
        return $this->prodcatPar;
    }
}
