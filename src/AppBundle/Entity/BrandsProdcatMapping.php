<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsProdcatMapping
 *
 * @ORM\Table(name="brands_prodcat_mapping", indexes={@ORM\Index(name="fk_brands_prodcat_mapping_1_idx", columns={"bpm_brand_id"}), @ORM\Index(name="fk_brands_prodcat_mapping_2_idx", columns={"bpm_mapped_prodcat_id"})})
 * @ORM\Entity
 */
class BrandsProdcatMapping
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bpm_brand_prodcat_id", type="integer", nullable=false)
     */
    private $bpmBrandProdcatId;

    /**
     * @var string
     *
     * @ORM\Column(name="bpm_brand_prodcat_name", type="string", length=45, nullable=false)
     */
    private $bpmBrandProdcatName;

    /**
     * @var integer
     *
     * @ORM\Column(name="bpm_addtime", type="integer", nullable=false)
     */
    private $bpmAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="bpm_lastmodified", type="integer", nullable=false)
     */
    private $bpmLastmodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="bpm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bpmId;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bpm_mapped_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $bpmMappedProdcat;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bpm_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $bpmBrand;


}

