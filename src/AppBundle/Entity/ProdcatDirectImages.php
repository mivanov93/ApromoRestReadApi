<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdcatDirectImages
 *
 * @ORM\Table(name="prodcat_direct_images")
 * @ORM\Entity
 */
class ProdcatDirectImages
{
    /**
     * @var string
     *
     * @ORM\Column(name="pdi_image_url", type="text", length=65535, nullable=false)
     */
    private $pdiImageUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_image_url_hash", type="integer", nullable=false)
     */
    private $pdiImageUrlHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_dl_image_hash", type="integer", nullable=false)
     */
    private $pdiDlImageHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_dl_start", type="integer", nullable=false)
     */
    private $pdiDlStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_dl_end", type="integer", nullable=false)
     */
    private $pdiDlEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_dl_status_code", type="integer", nullable=false)
     */
    private $pdiDlStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="pdi_dl_status_msg", type="string", length=512, nullable=false)
     */
    private $pdiDlStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_resize_image_hash", type="integer", nullable=false)
     */
    private $pdiResizeImageHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_resize_start", type="integer", nullable=false)
     */
    private $pdiResizeStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_resize_end", type="integer", nullable=false)
     */
    private $pdiResizeEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_resize_status_code", type="integer", nullable=false)
     */
    private $pdiResizeStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="pdi_resize_status_msg", type="string", length=512, nullable=false)
     */
    private $pdiResizeStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_addtime", type="integer", nullable=false)
     */
    private $pdiAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="pdi_lastmodified", type="integer", nullable=false)
     */
    private $pdiLastmodified;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pdi_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $pdiProdcat;


}

