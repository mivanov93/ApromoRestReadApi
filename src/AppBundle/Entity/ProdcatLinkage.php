<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdcatLinkage
 *
 * @ORM\Table(name="prodcat_linkage")
 * @ORM\Entity
 */
class ProdcatLinkage
{
    /**
     * @var string
     *
     * @ORM\Column(name="pl_indir_pars_ids", type="string", length=4096, nullable=false)
     */
    private $plIndirParsIds = '[]';

    /**
     * @var string
     *
     * @ORM\Column(name="test_pars_ids", type="string", length=4096, nullable=false)
     */
    private $testParsIds = '[]';

    /**
     * @var integer
     *
     * @ORM\Column(name="pl_prcount", type="integer", nullable=false)
     */
    private $plPrcount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pl_indir_prcount", type="integer", nullable=false)
     */
    private $plIndirPrcount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pl_addtime", type="integer", nullable=false)
     */
    private $plAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pl_lastmodified", type="integer", nullable=false)
     */
    private $plLastmodified;

    /**
     * @var \AppBundle\Entity\Prodcat
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Prodcat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pl_prodcat_id", referencedColumnName="prodcat_id")
     * })
     */
    private $plProdcat;


}

