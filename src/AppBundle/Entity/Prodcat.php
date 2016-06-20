<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prodcat
 *
 * @ORM\Table(name="prodcat", uniqueConstraints={@ORM\UniqueConstraint(name="prodcat_id", columns={"prodcat_id", "prodcat_name"})}, indexes={@ORM\Index(name="pars_exist", columns={"prodcat_par_id"})})
 * @ORM\Entity
 */
class Prodcat
{
    /**
     * @var string
     *
     * @ORM\Column(name="prodcat_name", type="string", length=64, nullable=false)
     */
    private $prodcatName;

    /**
     * @var string
     *
     * @ORM\Column(name="prodcat_descr", type="text", length=65535, nullable=false)
     */
    private $prodcatDescr;

    /**
     * @var integer
     *
     * @ORM\Column(name="prodcat_addtime", type="integer", nullable=false)
     */
    private $prodcatAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="prodcat_lastmodified", type="integer", nullable=false)
     */
    private $prodcatLastmodified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="prodcat_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prodcatId;

    /**
     * @var \AppBundle\Entity\ProdcatLinkage
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ProdcatLinkage", mappedBy="plProdcat")
     */
    private $prodcatLinkage;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prodcat_par_id", referencedColumnName="prodcat_id")
     * })
     */
    private $prodcatPar;


}

