<?php

namespace AppBundle\Entity;

/**
 * ProductsOrder
 */
class ProductsOrder
{
    /**
     * @var integer
     */
    private $poRand;

    /**
     * @var integer
     */
    private $poAddtime;

    /**
     * @var integer
     */
    private $poLastmodified;

    /**
     * @var \AppBundle\Entity\Products
     */
    private $poProd;


    /**
     * Set poRand
     *
     * @param integer $poRand
     *
     * @return ProductsOrder
     */
    public function setPoRand($poRand)
    {
        $this->poRand = $poRand;

        return $this;
    }

    /**
     * Get poRand
     *
     * @return integer
     */
    public function getPoRand()
    {
        return $this->poRand;
    }

    /**
     * Set poAddtime
     *
     * @param integer $poAddtime
     *
     * @return ProductsOrder
     */
    public function setPoAddtime($poAddtime)
    {
        $this->poAddtime = $poAddtime;

        return $this;
    }

    /**
     * Get poAddtime
     *
     * @return integer
     */
    public function getPoAddtime()
    {
        return $this->poAddtime;
    }

    /**
     * Set poLastmodified
     *
     * @param integer $poLastmodified
     *
     * @return ProductsOrder
     */
    public function setPoLastmodified($poLastmodified)
    {
        $this->poLastmodified = $poLastmodified;

        return $this;
    }

    /**
     * Get poLastmodified
     *
     * @return integer
     */
    public function getPoLastmodified()
    {
        return $this->poLastmodified;
    }

    /**
     * Set poProd
     *
     * @param \AppBundle\Entity\Products $poProd
     *
     * @return ProductsOrder
     */
    public function setPoProd(\AppBundle\Entity\Products $poProd)
    {
        $this->poProd = $poProd;

        return $this;
    }

    /**
     * Get poProd
     *
     * @return \AppBundle\Entity\Products
     */
    public function getPoProd()
    {
        return $this->poProd;
    }
}
