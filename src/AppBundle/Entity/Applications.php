<?php

namespace AppBundle\Entity;

/**
 * Applications
 */
class Applications
{
    /**
     * @var string
     */
    private $applEmail;

    /**
     * @var string
     */
    private $applUrl = '';

    /**
     * @var string
     */
    private $applPerson;

    /**
     * @var string
     */
    private $applCompany;

    /**
     * @var string
     */
    private $applEik;

    /**
     * @var string
     */
    private $applRegion = '';

    /**
     * @var string
     */
    private $applCity = '';

    /**
     * @var string
     */
    private $applAddress = '';

    /**
     * @var string
     */
    private $applIp;

    /**
     * @var integer
     */
    private $applAddtime;

    /**
     * @var integer
     */
    private $applId;


    /**
     * Set applEmail
     *
     * @param string $applEmail
     *
     * @return Applications
     */
    public function setApplEmail($applEmail)
    {
        $this->applEmail = $applEmail;

        return $this;
    }

    /**
     * Get applEmail
     *
     * @return string
     */
    public function getApplEmail()
    {
        return $this->applEmail;
    }

    /**
     * Set applUrl
     *
     * @param string $applUrl
     *
     * @return Applications
     */
    public function setApplUrl($applUrl)
    {
        $this->applUrl = $applUrl;

        return $this;
    }

    /**
     * Get applUrl
     *
     * @return string
     */
    public function getApplUrl()
    {
        return $this->applUrl;
    }

    /**
     * Set applPerson
     *
     * @param string $applPerson
     *
     * @return Applications
     */
    public function setApplPerson($applPerson)
    {
        $this->applPerson = $applPerson;

        return $this;
    }

    /**
     * Get applPerson
     *
     * @return string
     */
    public function getApplPerson()
    {
        return $this->applPerson;
    }

    /**
     * Set applCompany
     *
     * @param string $applCompany
     *
     * @return Applications
     */
    public function setApplCompany($applCompany)
    {
        $this->applCompany = $applCompany;

        return $this;
    }

    /**
     * Get applCompany
     *
     * @return string
     */
    public function getApplCompany()
    {
        return $this->applCompany;
    }

    /**
     * Set applEik
     *
     * @param string $applEik
     *
     * @return Applications
     */
    public function setApplEik($applEik)
    {
        $this->applEik = $applEik;

        return $this;
    }

    /**
     * Get applEik
     *
     * @return string
     */
    public function getApplEik()
    {
        return $this->applEik;
    }

    /**
     * Set applRegion
     *
     * @param string $applRegion
     *
     * @return Applications
     */
    public function setApplRegion($applRegion)
    {
        $this->applRegion = $applRegion;

        return $this;
    }

    /**
     * Get applRegion
     *
     * @return string
     */
    public function getApplRegion()
    {
        return $this->applRegion;
    }

    /**
     * Set applCity
     *
     * @param string $applCity
     *
     * @return Applications
     */
    public function setApplCity($applCity)
    {
        $this->applCity = $applCity;

        return $this;
    }

    /**
     * Get applCity
     *
     * @return string
     */
    public function getApplCity()
    {
        return $this->applCity;
    }

    /**
     * Set applAddress
     *
     * @param string $applAddress
     *
     * @return Applications
     */
    public function setApplAddress($applAddress)
    {
        $this->applAddress = $applAddress;

        return $this;
    }

    /**
     * Get applAddress
     *
     * @return string
     */
    public function getApplAddress()
    {
        return $this->applAddress;
    }

    /**
     * Set applIp
     *
     * @param string $applIp
     *
     * @return Applications
     */
    public function setApplIp($applIp)
    {
        $this->applIp = $applIp;

        return $this;
    }

    /**
     * Get applIp
     *
     * @return string
     */
    public function getApplIp()
    {
        return $this->applIp;
    }

    /**
     * Set applAddtime
     *
     * @param integer $applAddtime
     *
     * @return Applications
     */
    public function setApplAddtime($applAddtime)
    {
        $this->applAddtime = $applAddtime;

        return $this;
    }

    /**
     * Get applAddtime
     *
     * @return integer
     */
    public function getApplAddtime()
    {
        return $this->applAddtime;
    }

    /**
     * Get applId
     *
     * @return integer
     */
    public function getApplId()
    {
        return $this->applId;
    }
}
