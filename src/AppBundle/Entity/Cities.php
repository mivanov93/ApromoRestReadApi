<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cities
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity
 */
class Cities
{
    /**
     * @var string
     *
     * @ORM\Column(name="city_name", type="string", length=64, nullable=false)
     */
    private $cityName;

    /**
     * @var integer
     *
     * @ORM\Column(name="city_addtime", type="integer", nullable=false)
     */
    private $cityAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="city_lastmodified", type="integer", nullable=false)
     */
    private $cityLastmodified = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="city_latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $cityLatitude = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="city_longitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $cityLongitude = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="city_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cityId;


}

