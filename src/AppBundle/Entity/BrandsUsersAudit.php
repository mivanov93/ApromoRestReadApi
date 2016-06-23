<?php

namespace AppBundle\Entity;

/**
 * BrandsUsersAudit
 */
class BrandsUsersAudit
{
    /**
     * @var integer
     */
    private $buAuditLoggedin;

    /**
     * @var integer
     */
    private $buAuditLoggedout;

    /**
     * @var string
     */
    private $buAuditIpaddr;

    /**
     * @var string
     */
    private $buAuditBrowser;

    /**
     * @var integer
     */
    private $buAuditId;

    /**
     * @var \AppBundle\Entity\BrandsUsers
     */
    private $buAuditUser;


    /**
     * Set buAuditLoggedin
     *
     * @param integer $buAuditLoggedin
     *
     * @return BrandsUsersAudit
     */
    public function setBuAuditLoggedin($buAuditLoggedin)
    {
        $this->buAuditLoggedin = $buAuditLoggedin;

        return $this;
    }

    /**
     * Get buAuditLoggedin
     *
     * @return integer
     */
    public function getBuAuditLoggedin()
    {
        return $this->buAuditLoggedin;
    }

    /**
     * Set buAuditLoggedout
     *
     * @param integer $buAuditLoggedout
     *
     * @return BrandsUsersAudit
     */
    public function setBuAuditLoggedout($buAuditLoggedout)
    {
        $this->buAuditLoggedout = $buAuditLoggedout;

        return $this;
    }

    /**
     * Get buAuditLoggedout
     *
     * @return integer
     */
    public function getBuAuditLoggedout()
    {
        return $this->buAuditLoggedout;
    }

    /**
     * Set buAuditIpaddr
     *
     * @param string $buAuditIpaddr
     *
     * @return BrandsUsersAudit
     */
    public function setBuAuditIpaddr($buAuditIpaddr)
    {
        $this->buAuditIpaddr = $buAuditIpaddr;

        return $this;
    }

    /**
     * Get buAuditIpaddr
     *
     * @return string
     */
    public function getBuAuditIpaddr()
    {
        return $this->buAuditIpaddr;
    }

    /**
     * Set buAuditBrowser
     *
     * @param string $buAuditBrowser
     *
     * @return BrandsUsersAudit
     */
    public function setBuAuditBrowser($buAuditBrowser)
    {
        $this->buAuditBrowser = $buAuditBrowser;

        return $this;
    }

    /**
     * Get buAuditBrowser
     *
     * @return string
     */
    public function getBuAuditBrowser()
    {
        return $this->buAuditBrowser;
    }

    /**
     * Get buAuditId
     *
     * @return integer
     */
    public function getBuAuditId()
    {
        return $this->buAuditId;
    }

    /**
     * Set buAuditUser
     *
     * @param \AppBundle\Entity\BrandsUsers $buAuditUser
     *
     * @return BrandsUsersAudit
     */
    public function setBuAuditUser(\AppBundle\Entity\BrandsUsers $buAuditUser = null)
    {
        $this->buAuditUser = $buAuditUser;

        return $this;
    }

    /**
     * Get buAuditUser
     *
     * @return \AppBundle\Entity\BrandsUsers
     */
    public function getBuAuditUser()
    {
        return $this->buAuditUser;
    }
}
