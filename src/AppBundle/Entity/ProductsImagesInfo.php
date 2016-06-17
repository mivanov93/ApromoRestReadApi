<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImagesInfo
 *
 * @ORM\Table(name="products_images_info", indexes={@ORM\Index(name="pii_addtime", columns={"pii_addtime", "pii_lastmodified"})})
 * @ORM\Entity
 */
class ProductsImagesInfo
{
    /**
     * @var string
     *
     * @ORM\Column(name="pii_image_url", type="text", length=65535, nullable=false)
     */
    private $piiImageUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="pii_addtime", type="integer", nullable=false)
     */
    private $piiAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="pii_lastmodified", type="integer", nullable=false)
     */
    private $piiLastmodified;

    /**
     * @var \AppBundle\Entity\ProductsImages
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ProductsImages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pii_pi_id", referencedColumnName="pi_id")
     * })
     */
    private $piiPi;


}

