<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImagesDlLog
 *
 * @ORM\Table(name="products_images_dl_log", indexes={@ORM\Index(name="pidl_products_image_id", columns={"pidl_products_image_id"}), @ORM\Index(name="pidl_status_code", columns={"pidl_status_code"}), @ORM\Index(name="pidl_file_hash", columns={"pidl_file_hash"}), @ORM\Index(name="pidl_addtime", columns={"pidl_addtime"}), @ORM\Index(name="pidl_start", columns={"pidl_start"}), @ORM\Index(name="pidl_lastmodified", columns={"pidl_lastmodified"}), @ORM\Index(name="pidl_comp_index", columns={"pidl_products_image_id", "pidl_status_code"}), @ORM\Index(name="pidl_file_url_hash", columns={"pidl_file_url_hash"})})
 * @ORM\Entity
 */
class ProductsImagesDlLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_start", type="integer", nullable=false)
     */
    private $pidlStart = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_end", type="integer", nullable=false)
     */
    private $pidlEnd = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_status_code", type="integer", nullable=false)
     */
    private $pidlStatusCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="pidl_status_msg", type="string", length=512, nullable=false)
     */
    private $pidlStatusMsg = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_file_size", type="integer", nullable=false)
     */
    private $pidlFileSize = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_file_hash", type="integer", nullable=false)
     */
    private $pidlFileHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_file_url_hash", type="integer", nullable=false)
     */
    private $pidlFileUrlHash = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_addtime", type="integer", nullable=false)
     */
    private $pidlAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_lastmodified", type="integer", nullable=false)
     */
    private $pidlLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pidl_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pidlId;

    /**
     * @var \AppBundle\Entity\ProductsImages
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProductsImages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pidl_products_image_id", referencedColumnName="pi_id")
     * })
     */
    private $pidlProductsImage;


}

