<?php

namespace AppBundle\Entity;

/**
 * Cities
 */
class Cities
{
    /**
     * @var string
     */
    private $cityName;

    /**
     * @var integer
     */
    private $cityAddtime = '0';

    /**
     * @var integer
     */
    private $cityLastmodified = '0';

    /**
     * @var float
     */
    private $cityLatitude = '0';

    /**
     * @var float
     */
    private $cityLongitude = '0';

    /**
     * @var integer
     */
    private $cityId;


    /**
     * Set cityName
     *
     * @param string $cityName
     *
     * @return Cities
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Set cityAddtime
     *
     * @param integer $cityAddtime
     *
     * @return Cities
     */
    public function setCityAddtime($cityAddtime)
    {
        $this->cityAddtime = $cityAddtime;

        return $this;
    }

    /**
     * Get cityAddtime
     *
     * @return integer
     */
    public function getCityAddtime()
    {
        return $this->cityAddtime;
    }

    /**
     * Set cityLastmodified
     *
     * @param integer $cityLastmodified
     *
     * @return Cities
     */
    public function setCityLastmodified($cityLastmodified)
    {
        $this->cityLastmodified = $cityLastmodified;

        return $this;
    }

    /**
     * Get cityLastmodified
     *
     * @return integer
     */
    public function getCityLastmodified()
    {
        return $this->cityLastmodified;
    }

    /**
     * Set cityLatitude
     *
     * @param float $cityLatitude
     *
     * @return Cities
     */
    public function setCityLatitude($cityLatitude)
    {
        $this->cityLatitude = $cityLatitude;

        return $this;
    }

    /**
     * Get cityLatitude
     *
     * @return float
     */
    public function getCityLatitude()
    {
        return $this->cityLatitude;
    }

    /**
     * Set cityLongitude
     *
     * @param float $cityLongitude
     *
     * @return Cities
     */
    public function setCityLongitude($cityLongitude)
    {
        $this->cityLongitude = $cityLongitude;

        return $this;
    }

    /**
     * Get cityLongitude
     *
     * @return float
     */
    public function getCityLongitude()
    {
        return $this->cityLongitude;
    }

    /**
     * Get cityId
     *
     * @return integer
     */
    public function getCityId()
    {
        return $this->cityId;
    }
}

