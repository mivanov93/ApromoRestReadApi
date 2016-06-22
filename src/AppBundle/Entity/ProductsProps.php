<?php

namespace AppBundle\Entity;

/**
 * ProductsProps
 */
class ProductsProps
{
    /**
     * @var string
     */
    private $ppName;

    /**
     * @var integer
     */
    private $ppAddtime;

    /**
     * @var integer
     */
    private $ppLastmodified;

    /**
     * @var integer
     */
    private $ppId;


    /**
     * Set ppName
     *
     * @param string $ppName
     *
     * @return ProductsProps
     */
    public function setPpName($ppName)
    {
        $this->ppName = $ppName;

        return $this;
    }

    /**
     * Get ppName
     *
     * @return string
     */
    public function getPpName()
    {
        return $this->ppName;
    }

    /**
     * Set ppAddtime
     *
     * @param integer $ppAddtime
     *
     * @return ProductsProps
     */
    public function setPpAddtime($ppAddtime)
    {
        $this->ppAddtime = $ppAddtime;

        return $this;
    }

    /**
     * Get ppAddtime
     *
     * @return integer
     */
    public function getPpAddtime()
    {
        return $this->ppAddtime;
    }

    /**
     * Set ppLastmodified
     *
     * @param integer $ppLastmodified
     *
     * @return ProductsProps
     */
    public function setPpLastmodified($ppLastmodified)
    {
        $this->ppLastmodified = $ppLastmodified;

        return $this;
    }

    /**
     * Get ppLastmodified
     *
     * @return integer
     */
    public function getPpLastmodified()
    {
        return $this->ppLastmodified;
    }

    /**
     * Get ppId
     *
     * @return integer
     */
    public function getPpId()
    {
        return $this->ppId;
    }
}

