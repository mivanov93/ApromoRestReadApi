<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsImportDlLog
 *
 * @ORM\Table(name="brands_import_dl_log", indexes={@ORM\Index(name="bidl_brand_id", columns={"bidl_brand_id"}), @ORM\Index(name="bidl_import_format_id", columns={"bidl_import_format_id"}), @ORM\Index(name="bidl_status_code", columns={"bidl_status_code"}), @ORM\Index(name="bidl_start", columns={"bidl_start"})})
 * @ORM\Entity
 */
class BrandsImportDlLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_start", type="integer", nullable=false)
     */
    private $bidlStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_end", type="integer", nullable=false)
     */
    private $bidlEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_status_code", type="integer", nullable=false)
     */
    private $bidlStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="bidl_status_msg", type="string", length=512, nullable=false)
     */
    private $bidlStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_file_size", type="integer", nullable=false)
     */
    private $bidlFileSize = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_file_hash", type="integer", nullable=false)
     */
    private $bidlFileHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_file_url_hash", type="integer", nullable=false)
     */
    private $bidlFileUrlHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_addtime", type="integer", nullable=false)
     */
    private $bidlAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_lastmodified", type="integer", nullable=false)
     */
    private $bidlLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bidl_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bidlId;

    /**
     * @var \AppBundle\Entity\ImportFormats
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ImportFormats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bidl_import_format_id", referencedColumnName="if_id")
     * })
     */
    private $bidlImportFormat;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bidl_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $bidlBrand;


}

