<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shops
 *
 * @ORM\Table(name="shops", uniqueConstraints={@ORM\UniqueConstraint(name="shop_id", columns={"shop_id", "shop_name"})}, indexes={@ORM\Index(name="shop_brand_id", columns={"shop_brand_id"}), @ORM\Index(name="shop_city_id", columns={"shop_city_id"}), @ORM\Index(name="shop_active", columns={"shop_active"})})
 * @ORM\Entity
 */
class Shops
{
    /**
     * @var string
     *
     * @ORM\Column(name="shop_name", type="string", length=64, nullable=false)
     */
    private $shopName;

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_park_slots", type="integer", nullable=false)
     */
    private $shopParkSlots = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="shop_location", type="text", length=65535, nullable=false)
     */
    private $shopLocation;

    /**
     * @var float
     *
     * @ORM\Column(name="shop_latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $shopLatitude = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="shop_longitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $shopLongitude = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="shop_phone", type="string", length=64, nullable=false)
     */
    private $shopPhone = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_addtime", type="integer", nullable=false)
     */
    private $shopAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_lastmodified", type="integer", nullable=false)
     */
    private $shopLastmodified = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="shop_opens", type="string", length=16, nullable=false)
     */
    private $shopOpens;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_closes", type="string", length=16, nullable=false)
     */
    private $shopCloses;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_opens_sat", type="string", length=16, nullable=false)
     */
    private $shopOpensSat;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_closes_sat", type="string", length=16, nullable=false)
     */
    private $shopClosesSat;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_opens_sun", type="string", length=16, nullable=false)
     */
    private $shopOpensSun;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_closes_sun", type="string", length=16, nullable=false)
     */
    private $shopClosesSun;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shop_active", type="boolean", nullable=false)
     */
    private $shopActive = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $shopId;

    /**
     * @var \AppBundle\Entity\Cities
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shop_city_id", referencedColumnName="city_id")
     * })
     */
    private $shopCity;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shop_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $shopBrand;


}

