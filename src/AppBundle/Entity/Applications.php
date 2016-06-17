<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Applications
 *
 * @ORM\Table(name="applications")
 * @ORM\Entity
 */
class Applications
{
    /**
     * @var string
     *
     * @ORM\Column(name="appl_email", type="string", length=128, nullable=false)
     */
    private $applEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="appl_url", type="string", length=128, nullable=false)
     */
    private $applUrl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="appl_person", type="string", length=128, nullable=false)
     */
    private $applPerson;

    /**
     * @var string
     *
     * @ORM\Column(name="appl_company", type="string", length=128, nullable=false)
     */
    private $applCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="appl_eik", type="string", length=16, nullable=false)
     */
    private $applEik;

    /**
     * @var string
     *
     * @ORM\Column(name="appl_region", type="string", length=32, nullable=false)
     */
    private $applRegion = '';

    /**
     * @var string
     *
     * @ORM\Column(name="appl_city", type="string", length=32, nullable=false)
     */
    private $applCity = '';

    /**
     * @var string
     *
     * @ORM\Column(name="appl_address", type="string", length=128, nullable=false)
     */
    private $applAddress = '';

    /**
     * @var string
     *
     * @ORM\Column(name="appl_ip", type="string", length=16, nullable=false)
     */
    private $applIp;

    /**
     * @var integer
     *
     * @ORM\Column(name="appl_addtime", type="integer", nullable=false)
     */
    private $applAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="appl_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $applId;


}

