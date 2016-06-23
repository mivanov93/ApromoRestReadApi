<?php

namespace AppBundle\Entity;

/**
 * BrandsDirectImages
 */
class BrandsDirectImages
{
    /**
     * @var string
     */
    private $bdiImageUrl;

    /**
     * @var integer
     */
    private $bdiImageUrlHash = '0';

    /**
     * @var integer
     */
    private $bdiDlImageHash = '0';

    /**
     * @var integer
     */
    private $bdiDlStart = '0';

    /**
     * @var integer
     */
    private $bdiDlEnd = '0';

    /**
     * @var integer
     */
    private $bdiDlStatusCode = '0';

    /**
     * @var string
     */
    private $bdiDlStatusMsg = '';

    /**
     * @var integer
     */
    private $bdiResizeImageHash = '0';

    /**
     * @var integer
     */
    private $bdiResizeStart = '0';

    /**
     * @var integer
     */
    private $bdiResizeEnd = '0';

    /**
     * @var integer
     */
    private $bdiResizeStatusCode = '0';

    /**
     * @var string
     */
    private $bdiResizeStatusMsg = '';

    /**
     * @var integer
     */
    private $bdiAddtime;

    /**
     * @var integer
     */
    private $bdiLastmodified;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $bdiBrand;


    /**
     * Set bdiImageUrl
     *
     * @param string $bdiImageUrl
     *
     * @return BrandsDirectImages
     */
    public function setBdiImageUrl($bdiImageUrl)
    {
        $this->bdiImageUrl = $bdiImageUrl;

        return $this;
    }

    /**
     * Get bdiImageUrl
     *
     * @return string
     */
    public function getBdiImageUrl()
    {
        return $this->bdiImageUrl;
    }

    /**
     * Set bdiImageUrlHash
     *
     * @param integer $bdiImageUrlHash
     *
     * @return BrandsDirectImages
     */
    public function setBdiImageUrlHash($bdiImageUrlHash)
    {
        $this->bdiImageUrlHash = $bdiImageUrlHash;

        return $this;
    }

    /**
     * Get bdiImageUrlHash
     *
     * @return integer
     */
    public function getBdiImageUrlHash()
    {
        return $this->bdiImageUrlHash;
    }

    /**
     * Set bdiDlImageHash
     *
     * @param integer $bdiDlImageHash
     *
     * @return BrandsDirectImages
     */
    public function setBdiDlImageHash($bdiDlImageHash)
    {
        $this->bdiDlImageHash = $bdiDlImageHash;

        return $this;
    }

    /**
     * Get bdiDlImageHash
     *
     * @return integer
     */
    public function getBdiDlImageHash()
    {
        return $this->bdiDlImageHash;
    }

    /**
     * Set bdiDlStart
     *
     * @param integer $bdiDlStart
     *
     * @return BrandsDirectImages
     */
    public function setBdiDlStart($bdiDlStart)
    {
        $this->bdiDlStart = $bdiDlStart;

        return $this;
    }

    /**
     * Get bdiDlStart
     *
     * @return integer
     */
    public function getBdiDlStart()
    {
        return $this->bdiDlStart;
    }

    /**
     * Set bdiDlEnd
     *
     * @param integer $bdiDlEnd
     *
     * @return BrandsDirectImages
     */
    public function setBdiDlEnd($bdiDlEnd)
    {
        $this->bdiDlEnd = $bdiDlEnd;

        return $this;
    }

    /**
     * Get bdiDlEnd
     *
     * @return integer
     */
    public function getBdiDlEnd()
    {
        return $this->bdiDlEnd;
    }

    /**
     * Set bdiDlStatusCode
     *
     * @param integer $bdiDlStatusCode
     *
     * @return BrandsDirectImages
     */
    public function setBdiDlStatusCode($bdiDlStatusCode)
    {
        $this->bdiDlStatusCode = $bdiDlStatusCode;

        return $this;
    }

    /**
     * Get bdiDlStatusCode
     *
     * @return integer
     */
    public function getBdiDlStatusCode()
    {
        return $this->bdiDlStatusCode;
    }

    /**
     * Set bdiDlStatusMsg
     *
     * @param string $bdiDlStatusMsg
     *
     * @return BrandsDirectImages
     */
    public function setBdiDlStatusMsg($bdiDlStatusMsg)
    {
        $this->bdiDlStatusMsg = $bdiDlStatusMsg;

        return $this;
    }

    /**
     * Get bdiDlStatusMsg
     *
     * @return string
     */
    public function getBdiDlStatusMsg()
    {
        return $this->bdiDlStatusMsg;
    }

    /**
     * Set bdiResizeImageHash
     *
     * @param integer $bdiResizeImageHash
     *
     * @return BrandsDirectImages
     */
    public function setBdiResizeImageHash($bdiResizeImageHash)
    {
        $this->bdiResizeImageHash = $bdiResizeImageHash;

        return $this;
    }

    /**
     * Get bdiResizeImageHash
     *
     * @return integer
     */
    public function getBdiResizeImageHash()
    {
        return $this->bdiResizeImageHash;
    }

    /**
     * Set bdiResizeStart
     *
     * @param integer $bdiResizeStart
     *
     * @return BrandsDirectImages
     */
    public function setBdiResizeStart($bdiResizeStart)
    {
        $this->bdiResizeStart = $bdiResizeStart;

        return $this;
    }

    /**
     * Get bdiResizeStart
     *
     * @return integer
     */
    public function getBdiResizeStart()
    {
        return $this->bdiResizeStart;
    }

    /**
     * Set bdiResizeEnd
     *
     * @param integer $bdiResizeEnd
     *
     * @return BrandsDirectImages
     */
    public function setBdiResizeEnd($bdiResizeEnd)
    {
        $this->bdiResizeEnd = $bdiResizeEnd;

        return $this;
    }

    /**
     * Get bdiResizeEnd
     *
     * @return integer
     */
    public function getBdiResizeEnd()
    {
        return $this->bdiResizeEnd;
    }

    /**
     * Set bdiResizeStatusCode
     *
     * @param integer $bdiResizeStatusCode
     *
     * @return BrandsDirectImages
     */
    public function setBdiResizeStatusCode($bdiResizeStatusCode)
    {
        $this->bdiResizeStatusCode = $bdiResizeStatusCode;

        return $this;
    }

    /**
     * Get bdiResizeStatusCode
     *
     * @return integer
     */
    public function getBdiResizeStatusCode()
    {
        return $this->bdiResizeStatusCode;
    }

    /**
     * Set bdiResizeStatusMsg
     *
     * @param string $bdiResizeStatusMsg
     *
     * @return BrandsDirectImages
     */
    public function setBdiResizeStatusMsg($bdiResizeStatusMsg)
    {
        $this->bdiResizeStatusMsg = $bdiResizeStatusMsg;

        return $this;
    }

    /**
     * Get bdiResizeStatusMsg
     *
     * @return string
     */
    public function getBdiResizeStatusMsg()
    {
        return $this->bdiResizeStatusMsg;
    }

    /**
     * Set bdiAddtime
     *
     * @param integer $bdiAddtime
     *
     * @return BrandsDirectImages
     */
    public function setBdiAddtime($bdiAddtime)
    {
        $this->bdiAddtime = $bdiAddtime;

        return $this;
    }

    /**
     * Get bdiAddtime
     *
     * @return integer
     */
    public function getBdiAddtime()
    {
        return $this->bdiAddtime;
    }

    /**
     * Set bdiLastmodified
     *
     * @param integer $bdiLastmodified
     *
     * @return BrandsDirectImages
     */
    public function setBdiLastmodified($bdiLastmodified)
    {
        $this->bdiLastmodified = $bdiLastmodified;

        return $this;
    }

    /**
     * Get bdiLastmodified
     *
     * @return integer
     */
    public function getBdiLastmodified()
    {
        return $this->bdiLastmodified;
    }

    /**
     * Set bdiBrand
     *
     * @param \AppBundle\Entity\Brands $bdiBrand
     *
     * @return BrandsDirectImages
     */
    public function setBdiBrand(\AppBundle\Entity\Brands $bdiBrand)
    {
        $this->bdiBrand = $bdiBrand;

        return $this;
    }

    /**
     * Get bdiBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBdiBrand()
    {
        return $this->bdiBrand;
    }
}
