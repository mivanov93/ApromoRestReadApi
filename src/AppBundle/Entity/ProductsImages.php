<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImages
 *
 * @ORM\Table(name="products_images", indexes={@ORM\Index(name="pi_prod_id", columns={"pi_prod_id"}), @ORM\Index(name="pi_addtime", columns={"pi_addtime", "pi_lastmodified"})})
 * @ORM\Entity
 */
class ProductsImages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pi_order", type="integer", nullable=false)
     */
    private $piOrder = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pi_addtime", type="integer", nullable=false)
     */
    private $piAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="pi_lastmodified", type="integer", nullable=false)
     */
    private $piLastmodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="pi_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $piId;

    /**
     * @var \AppBundle\Entity\Products
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pi_prod_id", referencedColumnName="prod_id")
     * })
     */
    private $piProd;


}

