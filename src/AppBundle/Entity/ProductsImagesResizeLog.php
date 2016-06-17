<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImagesResizeLog
 *
 * @ORM\Table(name="products_images_resize_log", indexes={@ORM\Index(name="pirl_products_image_dl_log_id", columns={"pirl_products_image_dl_log_id"}), @ORM\Index(name="pirl_status_code", columns={"pirl_status_code"}), @ORM\Index(name="pirl_start", columns={"pirl_start"}), @ORM\Index(name="pirl_end", columns={"pirl_end"})})
 * @ORM\Entity
 */
class ProductsImagesResizeLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pirl_start", type="integer", nullable=false)
     */
    private $pirlStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pirl_end", type="integer", nullable=false)
     */
    private $pirlEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pirl_status_code", type="integer", nullable=false)
     */
    private $pirlStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="pirl_status_msg", type="string", length=512, nullable=false)
     */
    private $pirlStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="pirl_addtime", type="integer", nullable=false)
     */
    private $pirlAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pirl_lastmodified", type="integer", nullable=false)
     */
    private $pirlLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pirl_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pirlId;

    /**
     * @var \AppBundle\Entity\ProductsImagesDlLog
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProductsImagesDlLog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pirl_products_image_dl_log_id", referencedColumnName="pidl_id")
     * })
     */
    private $pirlProductsImageDlLog;


}

