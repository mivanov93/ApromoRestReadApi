<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsPropsMapping
 *
 * @ORM\Table(name="products_props_mapping", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_E83F86FDEFBB20FD", columns={"ppm_prop_name"})}, indexes={@ORM\Index(name="fk_products_props_mapping_1_idx", columns={"ppm_mapped_prop_id"})})
 * @ORM\Entity
 */
class ProductsPropsMapping
{
    /**
     * @var string
     *
     * @ORM\Column(name="ppm_prop_name", type="string", length=128, nullable=false)
     */
    private $ppmPropName;

    /**
     * @var integer
     *
     * @ORM\Column(name="ppm_addtime", type="integer", nullable=false)
     */
    private $ppmAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="ppm_lastmodified", type="integer", nullable=false)
     */
    private $ppmLastmodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="ppm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ppmId;

    /**
     * @var \AppBundle\Entity\ProductsProps
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProductsProps")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ppm_mapped_prop_id", referencedColumnName="pp_id")
     * })
     */
    private $ppmMappedProp;


}

