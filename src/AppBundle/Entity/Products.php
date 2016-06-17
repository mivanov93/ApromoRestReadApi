<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", uniqueConstraints={@ORM\UniqueConstraint(name="prod_unique_id_extra_index", columns={"prod_unique_id", "prod_brand_id"}), @ORM\UniqueConstraint(name="prod_comp_index", columns={"prod_id", "prod_brand_id"})}, indexes={@ORM\Index(name="prod_brand_id", columns={"prod_brand_id"}), @ORM\Index(name="prod_prodcat_id", columns={"prod_prodcat_id"}), @ORM\Index(name="prod_exptime", columns={"prod_exptime"}), @ORM\Index(name="prod_top", columns={"prod_top"}), @ORM\Index(name="prod_newprice", columns={"prod_newprice"}), @ORM\Index(name="prod_percentage", columns={"prod_percentage"}), @ORM\Index(name="prod_unique_id", columns={"prod_unique_id"}), @ORM\Index(name="prod_active", columns={"prod_active"}), @ORM\Index(name="prod_limited_avail", columns={"prod_limited_avail"}), @ORM\Index(name="prod_addtime_lastmod", columns={"prod_addtime", "prod_lastmodified"}), @ORM\Index(name="prod_name", columns={"prod_name"}), @ORM\Index(name="prod_descr_comp", columns={"prod_name", "prod_descr"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var string
     *
     * @ORM\Column(name="prod_name", type="string", length=255, nullable=false)
     */
    private $prodName;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_descr", type="text", length=65535, nullable=false)
     */
    private $prodDescr;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_url", type="text", length=65535, nullable=false)
     */
    private $prodUrl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="prod_limited_avail", type="boolean", nullable=false)
     */
    private $prodLimitedAvail = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="prod_oldprice", type="float", precision=10, scale=2, nullable=false)
     */
    private $prodOldprice;

    /**
     * @var float
     *
     * @ORM\Column(name="prod_newprice", type="float", precision=10, scale=2, nullable=false)
     */
    private $prodNewprice;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_percentage", type="integer", nullable=false)
     */
    private $prodPercentage;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_delivery_time", type="integer", nullable=false)
     */
    private $prodDeliveryTime = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="prod_delivery_cost", type="float", precision=10, scale=2, nullable=false)
     */
    private $prodDeliveryCost = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="prod_manufacturer", type="string", length=128, nullable=false)
     */
    private $prodManufacturer = '';

    /**
     * @var string
     *
     * @ORM\Column(name="prod_mpn", type="string", length=128, nullable=false)
     */
    private $prodMpn = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_barcode", type="bigint", nullable=false)
     */
    private $prodBarcode = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_addtime", type="integer", nullable=false)
     */
    private $prodAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_lastmodified", type="integer", nullable=false)
     */
    private $prodLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_validfrom", type="integer", nullable=false)
     */
    private $prodValidfrom = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_exptime", type="integer", nullable=false)
     */
    private $prodExptime = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="prod_active", type="boolean", nullable=false)
     */
    private $prodActive = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="prod_top", type="boolean", nullable=false)
     */
    private $prodTop = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="prod_unique_id", type="string", length=64, nullable=false)
     */
    private $prodUniqueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prodId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProductsImages", mappedBy="piProd")
     */
    private $prodPiCollection;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prod_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $prodProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prod_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $prodBrand;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prodPiCollection = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

