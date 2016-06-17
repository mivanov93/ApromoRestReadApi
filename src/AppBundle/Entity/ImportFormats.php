<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImportFormats
 *
 * @ORM\Table(name="import_formats", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_1EAC13D098CBC30F", columns={"if_name"})})
 * @ORM\Entity
 */
class ImportFormats
{
    /**
     * @var string
     *
     * @ORM\Column(name="if_name", type="string", length=32, nullable=false)
     */
    private $ifName;

    /**
     * @var integer
     *
     * @ORM\Column(name="if_addtime", type="integer", nullable=false)
     */
    private $ifAddtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="if_lastmodified", type="integer", nullable=false)
     */
    private $ifLastmodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="if_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ifId;


}

