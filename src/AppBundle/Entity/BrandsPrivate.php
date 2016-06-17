<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsPrivate
 *
 * @ORM\Table(name="brands_private")
 * @ORM\Entity
 */
class BrandsPrivate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bp_max_pr_count", type="integer", nullable=false)
     */
    private $bpMaxPrCount = '200';

    /**
     * @var integer
     *
     * @ORM\Column(name="bp_max_top_pr_count", type="integer", nullable=false)
     */
    private $bpMaxTopPrCount = '5';

    /**
     * @var integer
     *
     * @ORM\Column(name="bp_addtime", type="integer", nullable=false)
     */
    private $bpAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="bp_lastmodified", type="integer", nullable=false)
     */
    private $bpLastmodified;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bp_brand_id", referencedColumnName="brand_id")
     * })
     */
    private $bpBrand;


}

