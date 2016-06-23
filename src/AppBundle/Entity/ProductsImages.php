<?php

namespace AppBundle\Entity;

/**
 * ProductsImages
 */
class ProductsImages
{
    /**
     * @var integer
     */
    private $piOrder = '0';

    /**
     * @var integer
     */
    private $piAddtime;

    /**
     * @var integer
     */
    private $piLastmodified;

    /**
     * @var integer
     */
    private $piId;

    /**
     * @var \AppBundle\Entity\Products
     */
    private $piProd;


    /**
     * Set piOrder
     *
     * @param integer $piOrder
     *
     * @return ProductsImages
     */
    public function setPiOrder($piOrder)
    {
        $this->piOrder = $piOrder;

        return $this;
    }

    /**
     * Get piOrder
     *
     * @return integer
     */
    public function getPiOrder()
    {
        return $this->piOrder;
    }

    /**
     * Set piAddtime
     *
     * @param integer $piAddtime
     *
     * @return ProductsImages
     */
    public function setPiAddtime($piAddtime)
    {
        $this->piAddtime = $piAddtime;

        return $this;
    }

    /**
     * Get piAddtime
     *
     * @return integer
     */
    public function getPiAddtime()
    {
        return $this->piAddtime;
    }

    /**
     * Set piLastmodified
     *
     * @param integer $piLastmodified
     *
     * @return ProductsImages
     */
    public function setPiLastmodified($piLastmodified)
    {
        $this->piLastmodified = $piLastmodified;

        return $this;
    }

    /**
     * Get piLastmodified
     *
     * @return integer
     */
    public function getPiLastmodified()
    {
        return $this->piLastmodified;
    }

    /**
     * Get piId
     *
     * @return integer
     */
    public function getPiId()
    {
        return $this->piId;
    }

    /**
     * Set piProd
     *
     * @param \AppBundle\Entity\Products $piProd
     *
     * @return ProductsImages
     */
    public function setPiProd(\AppBundle\Entity\Products $piProd = null)
    {
        $this->piProd = $piProd;

        return $this;
    }

    /**
     * Get piProd
     *
     * @return \AppBundle\Entity\Products
     */
    public function getPiProd()
    {
        return $this->piProd;
    }
}
