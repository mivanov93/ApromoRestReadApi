<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsDirectImages
 *
 * @ORM\Table(name="brands_direct_images")
 * @ORM\Entity
 */
class BrandsDirectImages
{
    /**
     * @var string
     *
     * @ORM\Column(name="bdi_image_url", type="text", length=65535, nullable=false)
     */
    private $bdiImageUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_image_url_hash", type="integer", nullable=false)
     */
    private $bdiImageUrlHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_dl_image_hash", type="integer", nullable=false)
     */
    private $bdiDlImageHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_dl_start", type="integer", nullable=false)
     */
    private $bdiDlStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_dl_end", type="integer", nullable=false)
     */
    private $bdiDlEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_dl_status_code", type="integer", nullable=false)
     */
    private $bdiDlStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="bdi_dl_status_msg", type="string", length=512, nullable=false)
     */
    private $bdiDlStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_resize_image_hash", type="integer", nullable=false)
     */
    private $bdiResizeImageHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_resize_start", type="integer", nullable=false)
     */
    private $bdiResizeStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_resize_end", type="integer", nullable=false)
     */
    private $bdiResizeEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_resize_status_code", type="integer", nullable=false)
     */
    private $bdiResizeStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="bdi_resize_status_msg", type="string", length=512, nullable=false)
     */
    private $bdiResizeStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_addtime", type="integer", nullable=false)
     */
    private $bdiAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="bdi_lastmodified", type="integer", nullable=false)
     */
    private $bdiLastmodified;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bdi_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $bdiBrand;


}

