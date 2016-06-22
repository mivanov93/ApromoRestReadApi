<?php

namespace AppBundle\Entity;

/**
 * BrandsImportDlLog
 */
class BrandsImportDlLog
{
    /**
     * @var integer
     */
    private $bidlStart = '0';

    /**
     * @var integer
     */
    private $bidlEnd = '0';

    /**
     * @var integer
     */
    private $bidlStatusCode = '0';

    /**
     * @var string
     */
    private $bidlStatusMsg = '';

    /**
     * @var integer
     */
    private $bidlFileSize = '0';

    /**
     * @var integer
     */
    private $bidlFileHash = '0';

    /**
     * @var integer
     */
    private $bidlFileUrlHash = '0';

    /**
     * @var integer
     */
    private $bidlAddtime = '0';

    /**
     * @var integer
     */
    private $bidlLastmodified = '0';

    /**
     * @var integer
     */
    private $bidlId;

    /**
     * @var \AppBundle\Entity\ImportFormats
     */
    private $bidlImportFormat;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $bidlBrand;


    /**
     * Set bidlStart
     *
     * @param integer $bidlStart
     *
     * @return BrandsImportDlLog
     */
    public function setBidlStart($bidlStart)
    {
        $this->bidlStart = $bidlStart;

        return $this;
    }

    /**
     * Get bidlStart
     *
     * @return integer
     */
    public function getBidlStart()
    {
        return $this->bidlStart;
    }

    /**
     * Set bidlEnd
     *
     * @param integer $bidlEnd
     *
     * @return BrandsImportDlLog
     */
    public function setBidlEnd($bidlEnd)
    {
        $this->bidlEnd = $bidlEnd;

        return $this;
    }

    /**
     * Get bidlEnd
     *
     * @return integer
     */
    public function getBidlEnd()
    {
        return $this->bidlEnd;
    }

    /**
     * Set bidlStatusCode
     *
     * @param integer $bidlStatusCode
     *
     * @return BrandsImportDlLog
     */
    public function setBidlStatusCode($bidlStatusCode)
    {
        $this->bidlStatusCode = $bidlStatusCode;

        return $this;
    }

    /**
     * Get bidlStatusCode
     *
     * @return integer
     */
    public function getBidlStatusCode()
    {
        return $this->bidlStatusCode;
    }

    /**
     * Set bidlStatusMsg
     *
     * @param string $bidlStatusMsg
     *
     * @return BrandsImportDlLog
     */
    public function setBidlStatusMsg($bidlStatusMsg)
    {
        $this->bidlStatusMsg = $bidlStatusMsg;

        return $this;
    }

    /**
     * Get bidlStatusMsg
     *
     * @return string
     */
    public function getBidlStatusMsg()
    {
        return $this->bidlStatusMsg;
    }

    /**
     * Set bidlFileSize
     *
     * @param integer $bidlFileSize
     *
     * @return BrandsImportDlLog
     */
    public function setBidlFileSize($bidlFileSize)
    {
        $this->bidlFileSize = $bidlFileSize;

        return $this;
    }

    /**
     * Get bidlFileSize
     *
     * @return integer
     */
    public function getBidlFileSize()
    {
        return $this->bidlFileSize;
    }

    /**
     * Set bidlFileHash
     *
     * @param integer $bidlFileHash
     *
     * @return BrandsImportDlLog
     */
    public function setBidlFileHash($bidlFileHash)
    {
        $this->bidlFileHash = $bidlFileHash;

        return $this;
    }

    /**
     * Get bidlFileHash
     *
     * @return integer
     */
    public function getBidlFileHash()
    {
        return $this->bidlFileHash;
    }

    /**
     * Set bidlFileUrlHash
     *
     * @param integer $bidlFileUrlHash
     *
     * @return BrandsImportDlLog
     */
    public function setBidlFileUrlHash($bidlFileUrlHash)
    {
        $this->bidlFileUrlHash = $bidlFileUrlHash;

        return $this;
    }

    /**
     * Get bidlFileUrlHash
     *
     * @return integer
     */
    public function getBidlFileUrlHash()
    {
        return $this->bidlFileUrlHash;
    }

    /**
     * Set bidlAddtime
     *
     * @param integer $bidlAddtime
     *
     * @return BrandsImportDlLog
     */
    public function setBidlAddtime($bidlAddtime)
    {
        $this->bidlAddtime = $bidlAddtime;

        return $this;
    }

    /**
     * Get bidlAddtime
     *
     * @return integer
     */
    public function getBidlAddtime()
    {
        return $this->bidlAddtime;
    }

    /**
     * Set bidlLastmodified
     *
     * @param integer $bidlLastmodified
     *
     * @return BrandsImportDlLog
     */
    public function setBidlLastmodified($bidlLastmodified)
    {
        $this->bidlLastmodified = $bidlLastmodified;

        return $this;
    }

    /**
     * Get bidlLastmodified
     *
     * @return integer
     */
    public function getBidlLastmodified()
    {
        return $this->bidlLastmodified;
    }

    /**
     * Get bidlId
     *
     * @return integer
     */
    public function getBidlId()
    {
        return $this->bidlId;
    }

    /**
     * Set bidlImportFormat
     *
     * @param \AppBundle\Entity\ImportFormats $bidlImportFormat
     *
     * @return BrandsImportDlLog
     */
    public function setBidlImportFormat(\AppBundle\Entity\ImportFormats $bidlImportFormat = null)
    {
        $this->bidlImportFormat = $bidlImportFormat;

        return $this;
    }

    /**
     * Get bidlImportFormat
     *
     * @return \AppBundle\Entity\ImportFormats
     */
    public function getBidlImportFormat()
    {
        return $this->bidlImportFormat;
    }

    /**
     * Set bidlBrand
     *
     * @param \AppBundle\Entity\Brands $bidlBrand
     *
     * @return BrandsImportDlLog
     */
    public function setBidlBrand(\AppBundle\Entity\Brands $bidlBrand = null)
    {
        $this->bidlBrand = $bidlBrand;

        return $this;
    }

    /**
     * Get bidlBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBidlBrand()
    {
        return $this->bidlBrand;
    }
}

