<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brands
 *
 * @ORM\Table(name="brands", uniqueConstraints={@ORM\UniqueConstraint(name="brand_id", columns={"brand_id", "brand_name"})}, indexes={@ORM\Index(name="brand_prcount", columns={"brand_prcount"}), @ORM\Index(name="brand_active", columns={"brand_active"})})
 * @ORM\Entity
 */
class Brands
{
    /**
     * @var string
     *
     * @ORM\Column(name="brand_name", type="string", length=64, nullable=false)
     */
    private $brandName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="brand_partner", type="boolean", nullable=false)
     */
    private $brandPartner = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_addtime", type="integer", nullable=false)
     */
    private $brandAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_lastmodified", type="integer", nullable=false)
     */
    private $brandLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_expiration", type="integer", nullable=false)
     */
    private $brandExpiration = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="brand_descr", type="text", length=65535, nullable=false)
     */
    private $brandDescr;

    /**
     * @var string
     *
     * @ORM\Column(name="brand_url", type="string", length=64, nullable=false)
     */
    private $brandUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_order", type="integer", nullable=false)
     */
    private $brandOrder = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="brand_active", type="boolean", nullable=false)
     */
    private $brandActive = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_prcount", type="integer", nullable=false)
     */
    private $brandPrcount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_shopcount", type="integer", nullable=false)
     */
    private $brandShopcount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $brandId;


}

