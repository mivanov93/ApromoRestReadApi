<?php

namespace AppBundle\Entity;

/**
 * ImportFormats
 */
class ImportFormats
{
    /**
     * @var string
     */
    private $ifName;

    /**
     * @var integer
     */
    private $ifAddtime;

    /**
     * @var integer
     */
    private $ifLastmodified;

    /**
     * @var integer
     */
    private $ifId;


    /**
     * Set ifName
     *
     * @param string $ifName
     *
     * @return ImportFormats
     */
    public function setIfName($ifName)
    {
        $this->ifName = $ifName;

        return $this;
    }

    /**
     * Get ifName
     *
     * @return string
     */
    public function getIfName()
    {
        return $this->ifName;
    }

    /**
     * Set ifAddtime
     *
     * @param integer $ifAddtime
     *
     * @return ImportFormats
     */
    public function setIfAddtime($ifAddtime)
    {
        $this->ifAddtime = $ifAddtime;

        return $this;
    }

    /**
     * Get ifAddtime
     *
     * @return integer
     */
    public function getIfAddtime()
    {
        return $this->ifAddtime;
    }

    /**
     * Set ifLastmodified
     *
     * @param integer $ifLastmodified
     *
     * @return ImportFormats
     */
    public function setIfLastmodified($ifLastmodified)
    {
        $this->ifLastmodified = $ifLastmodified;

        return $this;
    }

    /**
     * Get ifLastmodified
     *
     * @return integer
     */
    public function getIfLastmodified()
    {
        return $this->ifLastmodified;
    }

    /**
     * Get ifId
     *
     * @return integer
     */
    public function getIfId()
    {
        return $this->ifId;
    }
}
