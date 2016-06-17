<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsArchive
 *
 * @ORM\Table(name="products_archive", indexes={@ORM\Index(name="pa_prod_brand_id", columns={"pa_prod_brand_id"}), @ORM\Index(name="pa_prod_prodcat_id", columns={"pa_prod_prodcat_id"})})
 * @ORM\Entity
 */
class ProductsArchive
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pa_addtime", type="integer", nullable=false)
     */
    private $paAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_prod_id", type="integer", nullable=false)
     */
    private $paProdId;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_prod_name", type="string", length=64, nullable=false)
     */
    private $paProdName;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_prod_descr", type="text", length=65535, nullable=false)
     */
    private $paProdDescr;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_prod_url", type="text", length=65535, nullable=false)
     */
    private $paProdUrl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pa_prod_limited_avail", type="boolean", nullable=false)
     */
    private $paProdLimitedAvail = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="pa_prod_oldprice", type="float", precision=10, scale=2, nullable=false)
     */
    private $paProdOldprice;

    /**
     * @var float
     *
     * @ORM\Column(name="pa_prod_newprice", type="float", precision=10, scale=2, nullable=false)
     */
    private $paProdNewprice;

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_prod_percentage", type="integer", nullable=false)
     */
    private $paProdPercentage;

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_prod_addtime", type="integer", nullable=false)
     */
    private $paProdAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_prod_lastmodified", type="integer", nullable=false)
     */
    private $paProdLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_prod_validfrom", type="integer", nullable=false)
     */
    private $paProdValidfrom = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_prod_exptime", type="integer", nullable=false)
     */
    private $paProdExptime = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="pa_prod_active", type="boolean", nullable=false)
     */
    private $paProdActive = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="pa_prod_top", type="boolean", nullable=false)
     */
    private $paProdTop = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_prod_unique_id", type="integer", nullable=true)
     */
    private $paProdUniqueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pa_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paId;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pa_prod_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $paProdProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pa_prod_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $paProdBrand;


}

