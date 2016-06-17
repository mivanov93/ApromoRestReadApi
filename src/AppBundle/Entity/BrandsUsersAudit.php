<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsUsersAudit
 *
 * @ORM\Table(name="brands_users_audit", indexes={@ORM\Index(name="bu_audit_user_id", columns={"bu_audit_user_id"})})
 * @ORM\Entity
 */
class BrandsUsersAudit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bu_audit_loggedin", type="integer", nullable=false)
     */
    private $buAuditLoggedin;

    /**
     * @var integer
     *
     * @ORM\Column(name="bu_audit_loggedout", type="integer", nullable=false)
     */
    private $buAuditLoggedout;

    /**
     * @var string
     *
     * @ORM\Column(name="bu_audit_ipaddr", type="string", length=64, nullable=false)
     */
    private $buAuditIpaddr;

    /**
     * @var string
     *
     * @ORM\Column(name="bu_audit_browser", type="string", length=64, nullable=false)
     */
    private $buAuditBrowser;

    /**
     * @var integer
     *
     * @ORM\Column(name="bu_audit_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $buAuditId;

    /**
     * @var \AppBundle\Entity\BrandsUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BrandsUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bu_audit_user_id", referencedColumnName="bu_id")
     * })
     */
    private $buAuditUser;


}

