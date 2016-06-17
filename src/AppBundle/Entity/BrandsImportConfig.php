<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsImportConfig
 *
 * @ORM\Table(name="brands_import_config", indexes={@ORM\Index(name="bic_prodcat_id", columns={"bic_prodcat_id"}), @ORM\Index(name="bic_lastmodified", columns={"bic_lastmodified"}), @ORM\Index(name="bic_runeverysecs", columns={"bic_runeverysecs"})})
 * @ORM\Entity
 */
class BrandsImportConfig
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bic_runeverysecs", type="integer", nullable=false)
     */
    private $bicRuneverysecs = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="bic_importurl", type="text", length=65535, nullable=false)
     */
    private $bicImporturl;

    /**
     * @var integer
     *
     * @ORM\Column(name="bic_addtime", type="integer", nullable=false)
     */
    private $bicAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bic_lastmodified", type="integer", nullable=false)
     */
    private $bicLastmodified = '0';

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bic_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $bicBrand;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bic_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $bicProdcat;


}

