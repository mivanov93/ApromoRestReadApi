<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdcatMapping
 *
 * @ORM\Table(name="prodcat_mapping", uniqueConstraints={@ORM\UniqueConstraint(name="pm_prodcat_name", columns={"pm_prodcat_name"})}, indexes={@ORM\Index(name="fk_prodcat_mapping_1_idx", columns={"pm_mapped_prodcat_id"})})
 * @ORM\Entity
 */
class ProdcatMapping
{
    /**
     * @var string
     *
     * @ORM\Column(name="pm_prodcat_name", type="string", length=255, nullable=false)
     */
    private $pmProdcatName;

    /**
     * @var integer
     *
     * @ORM\Column(name="pm_addtime", type="integer", nullable=false)
     */
    private $pmAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="pm_lastmodified", type="integer", nullable=false)
     */
    private $pmLastmodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="pm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pmId;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pm_mapped_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $pmMappedProdcat;


}

