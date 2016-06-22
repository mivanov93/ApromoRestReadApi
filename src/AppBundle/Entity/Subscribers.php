<?php

namespace AppBundle\Entity;

/**
 * Subscribers
 */
class Subscribers
{
    /**
     * @var string
     */
    private $subscrEmail;

    /**
     * @var string
     */
    private $subscrIp;

    /**
     * @var string
     */
    private $subscrRemoveKey;

    /**
     * @var integer
     */
    private $subscrSentCount = '0';

    /**
     * @var integer
     */
    private $subscrAddtime = '0';

    /**
     * @var integer
     */
    private $subscrId;


    /**
     * Set subscrEmail
     *
     * @param string $subscrEmail
     *
     * @return Subscribers
     */
    public function setSubscrEmail($subscrEmail)
    {
        $this->subscrEmail = $subscrEmail;

        return $this;
    }

    /**
     * Get subscrEmail
     *
     * @return string
     */
    public function getSubscrEmail()
    {
        return $this->subscrEmail;
    }

    /**
     * Set subscrIp
     *
     * @param string $subscrIp
     *
     * @return Subscribers
     */
    public function setSubscrIp($subscrIp)
    {
        $this->subscrIp = $subscrIp;

        return $this;
    }

    /**
     * Get subscrIp
     *
     * @return string
     */
    public function getSubscrIp()
    {
        return $this->subscrIp;
    }

    /**
     * Set subscrRemoveKey
     *
     * @param string $subscrRemoveKey
     *
     * @return Subscribers
     */
    public function setSubscrRemoveKey($subscrRemoveKey)
    {
        $this->subscrRemoveKey = $subscrRemoveKey;

        return $this;
    }

    /**
     * Get subscrRemoveKey
     *
     * @return string
     */
    public function getSubscrRemoveKey()
    {
        return $this->subscrRemoveKey;
    }

    /**
     * Set subscrSentCount
     *
     * @param integer $subscrSentCount
     *
     * @return Subscribers
     */
    public function setSubscrSentCount($subscrSentCount)
    {
        $this->subscrSentCount = $subscrSentCount;

        return $this;
    }

    /**
     * Get subscrSentCount
     *
     * @return integer
     */
    public function getSubscrSentCount()
    {
        return $this->subscrSentCount;
    }

    /**
     * Set subscrAddtime
     *
     * @param integer $subscrAddtime
     *
     * @return Subscribers
     */
    public function setSubscrAddtime($subscrAddtime)
    {
        $this->subscrAddtime = $subscrAddtime;

        return $this;
    }

    /**
     * Get subscrAddtime
     *
     * @return integer
     */
    public function getSubscrAddtime()
    {
        return $this->subscrAddtime;
    }

    /**
     * Get subscrId
     *
     * @return integer
     */
    public function getSubscrId()
    {
        return $this->subscrId;
    }
}

