<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsHistory
 *
 * @ORM\Table(name="products_history", indexes={@ORM\Index(name="prodhist_brand_id", columns={"ph_prod_brand_id"}), @ORM\Index(name="prodhist_prod_id", columns={"ph_prod_id"}), @ORM\Index(name="prodhist_prod_prodcat_id", columns={"ph_prod_prodcat_id"})})
 * @ORM\Entity
 */
class ProductsHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ph_prod_id", type="integer", nullable=false)
     */
    private $phProdId;

    /**
     * @var string
     *
     * @ORM\Column(name="ph_prod_name", type="string", length=64, nullable=true)
     */
    private $phProdName;

    /**
     * @var string
     *
     * @ORM\Column(name="ph_prod_url", type="text", length=65535, nullable=true)
     */
    private $phProdUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="ph_prod_descr", type="text", length=65535, nullable=true)
     */
    private $phProdDescr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ph_prod_top", type="boolean", nullable=false)
     */
    private $phProdTop;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ph_prod_limited_avail", type="boolean", nullable=false)
     */
    private $phProdLimitedAvail;

    /**
     * @var float
     *
     * @ORM\Column(name="ph_prod_newprice", type="float", precision=10, scale=2, nullable=false)
     */
    private $phProdNewprice;

    /**
     * @var float
     *
     * @ORM\Column(name="ph_prod_oldprice", type="float", precision=10, scale=2, nullable=false)
     */
    private $phProdOldprice;

    /**
     * @var integer
     *
     * @ORM\Column(name="ph_prod_percentage", type="integer", nullable=false)
     */
    private $phProdPercentage;

    /**
     * @var integer
     *
     * @ORM\Column(name="ph_prod_validfrom", type="integer", nullable=false)
     */
    private $phProdValidfrom;

    /**
     * @var integer
     *
     * @ORM\Column(name="ph_prod_exptime", type="integer", nullable=false)
     */
    private $phProdExptime;

    /**
     * @var integer
     *
     * @ORM\Column(name="ph_addtime", type="integer", nullable=false)
     */
    private $phAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="ph_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phId;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ph_prod_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $phProdProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ph_prod_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $phProdBrand;


}

