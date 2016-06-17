<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsUsers
 *
 * @ORM\Table(name="brands_users", uniqueConstraints={@ORM\UniqueConstraint(name="user_email", columns={"bu_email"})}, indexes={@ORM\Index(name="bu_level", columns={"bu_level"}), @ORM\Index(name="bu_brand_id", columns={"bu_brand_id"})})
 * @ORM\Entity
 */
class BrandsUsers
{
    /**
     * @var string
     *
     * @ORM\Column(name="bu_email", type="string", length=64, nullable=false)
     */
    private $buEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="bu_name", type="string", length=64, nullable=false)
     */
    private $buName;

    /**
     * @var string
     *
     * @ORM\Column(name="bu_passhash", type="string", length=128, nullable=false)
     */
    private $buPasshash;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bu_active", type="boolean", nullable=false)
     */
    private $buActive = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="bu_addtime", type="integer", nullable=false)
     */
    private $buAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="bu_lastmodified", type="integer", nullable=false)
     */
    private $buLastmodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="bu_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $buId;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bu_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $buBrand;

    /**
     * @var \AppBundle\Entity\BrandsUsersRoles
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BrandsUsersRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bu_level", referencedColumnName="bu_role_level")
     * })
     */
    private $buLevel;


}

