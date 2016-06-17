<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsProps
 *
 * @ORM\Table(name="products_props", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_BB275478BF02FB94", columns={"pp_name"})})
 * @ORM\Entity
 */
class ProductsProps
{
    /**
     * @var string
     *
     * @ORM\Column(name="pp_name", type="string", length=64, nullable=false)
     */
    private $ppName;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_addtime", type="integer", nullable=false)
     */
    private $ppAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_lastmodified", type="integer", nullable=false)
     */
    private $ppLastmodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ppId;


}

