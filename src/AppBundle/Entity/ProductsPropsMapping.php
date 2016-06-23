<?php

namespace AppBundle\Entity;

/**
 * ProductsPropsMapping
 */
class ProductsPropsMapping
{
    /**
     * @var string
     */
    private $ppmPropName;

    /**
     * @var integer
     */
    private $ppmAddtime;

    /**
     * @var integer
     */
    private $ppmLastmodified;

    /**
     * @var integer
     */
    private $ppmId;

    /**
     * @var \AppBundle\Entity\ProductsProps
     */
    private $ppmMappedProp;


    /**
     * Set ppmPropName
     *
     * @param string $ppmPropName
     *
     * @return ProductsPropsMapping
     */
    public function setPpmPropName($ppmPropName)
    {
        $this->ppmPropName = $ppmPropName;

        return $this;
    }

    /**
     * Get ppmPropName
     *
     * @return string
     */
    public function getPpmPropName()
    {
        return $this->ppmPropName;
    }

    /**
     * Set ppmAddtime
     *
     * @param integer $ppmAddtime
     *
     * @return ProductsPropsMapping
     */
    public function setPpmAddtime($ppmAddtime)
    {
        $this->ppmAddtime = $ppmAddtime;

        return $this;
    }

    /**
     * Get ppmAddtime
     *
     * @return integer
     */
    public function getPpmAddtime()
    {
        return $this->ppmAddtime;
    }

    /**
     * Set ppmLastmodified
     *
     * @param integer $ppmLastmodified
     *
     * @return ProductsPropsMapping
     */
    public function setPpmLastmodified($ppmLastmodified)
    {
        $this->ppmLastmodified = $ppmLastmodified;

        return $this;
    }

    /**
     * Get ppmLastmodified
     *
     * @return integer
     */
    public function getPpmLastmodified()
    {
        return $this->ppmLastmodified;
    }

    /**
     * Get ppmId
     *
     * @return integer
     */
    public function getPpmId()
    {
        return $this->ppmId;
    }

    /**
     * Set ppmMappedProp
     *
     * @param \AppBundle\Entity\ProductsProps $ppmMappedProp
     *
     * @return ProductsPropsMapping
     */
    public function setPpmMappedProp(\AppBundle\Entity\ProductsProps $ppmMappedProp = null)
    {
        $this->ppmMappedProp = $ppmMappedProp;

        return $this;
    }

    /**
     * Get ppmMappedProp
     *
     * @return \AppBundle\Entity\ProductsProps
     */
    public function getPpmMappedProp()
    {
        return $this->ppmMappedProp;
    }
}
