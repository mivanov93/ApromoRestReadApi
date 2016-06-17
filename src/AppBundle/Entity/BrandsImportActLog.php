<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsImportActLog
 *
 * @ORM\Table(name="brands_import_act_log", indexes={@ORM\Index(name="IDX_BE1BCC8F29D53CE", columns={"bial_brand_id"}), @ORM\Index(name="IDX_BE1BCC8FB54E1D61", columns={"bial_brand_import_dl_log_id"})})
 * @ORM\Entity
 */
class BrandsImportActLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bial_start", type="integer", nullable=false)
     */
    private $bialStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_end", type="integer", nullable=false)
     */
    private $bialEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_status_code", type="integer", nullable=false)
     */
    private $bialStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="bial_status_msg", type="string", length=512, nullable=false)
     */
    private $bialStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_count_products_new", type="integer", nullable=false)
     */
    private $bialCountProductsNew = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_count_products_updated", type="integer", nullable=false)
     */
    private $bialCountProductsUpdated = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_count_products_deleted", type="integer", nullable=false)
     */
    private $bialCountProductsDeleted = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_addtime", type="integer", nullable=false)
     */
    private $bialAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_lastmodified", type="integer", nullable=false)
     */
    private $bialLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bial_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bialId;

    /**
     * @var \AppBundle\Entity\BrandsImportDlLog
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BrandsImportDlLog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bial_brand_import_dl_log_id", referencedColumnName="bidl_id")
     * })
     */
    private $bialBrandImportDlLog;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bial_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $bialBrand;


}

