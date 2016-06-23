<?php

namespace AppBundle\Entity;

/**
 * BrandsImportActLog
 */
class BrandsImportActLog
{
    /**
     * @var integer
     */
    private $bialStart = '0';

    /**
     * @var integer
     */
    private $bialEnd = '0';

    /**
     * @var integer
     */
    private $bialStatusCode = '0';

    /**
     * @var string
     */
    private $bialStatusMsg = '';

    /**
     * @var integer
     */
    private $bialCountProductsNew = '0';

    /**
     * @var integer
     */
    private $bialCountProductsUpdated = '0';

    /**
     * @var integer
     */
    private $bialCountProductsDeleted = '0';

    /**
     * @var integer
     */
    private $bialAddtime = '0';

    /**
     * @var integer
     */
    private $bialLastmodified = '0';

    /**
     * @var integer
     */
    private $bialId;

    /**
     * @var \AppBundle\Entity\BrandsImportDlLog
     */
    private $bialBrandImportDlLog;

    /**
     * @var \AppBundle\Entity\Brands
     */
    private $bialBrand;


    /**
     * Set bialStart
     *
     * @param integer $bialStart
     *
     * @return BrandsImportActLog
     */
    public function setBialStart($bialStart)
    {
        $this->bialStart = $bialStart;

        return $this;
    }

    /**
     * Get bialStart
     *
     * @return integer
     */
    public function getBialStart()
    {
        return $this->bialStart;
    }

    /**
     * Set bialEnd
     *
     * @param integer $bialEnd
     *
     * @return BrandsImportActLog
     */
    public function setBialEnd($bialEnd)
    {
        $this->bialEnd = $bialEnd;

        return $this;
    }

    /**
     * Get bialEnd
     *
     * @return integer
     */
    public function getBialEnd()
    {
        return $this->bialEnd;
    }

    /**
     * Set bialStatusCode
     *
     * @param integer $bialStatusCode
     *
     * @return BrandsImportActLog
     */
    public function setBialStatusCode($bialStatusCode)
    {
        $this->bialStatusCode = $bialStatusCode;

        return $this;
    }

    /**
     * Get bialStatusCode
     *
     * @return integer
     */
    public function getBialStatusCode()
    {
        return $this->bialStatusCode;
    }

    /**
     * Set bialStatusMsg
     *
     * @param string $bialStatusMsg
     *
     * @return BrandsImportActLog
     */
    public function setBialStatusMsg($bialStatusMsg)
    {
        $this->bialStatusMsg = $bialStatusMsg;

        return $this;
    }

    /**
     * Get bialStatusMsg
     *
     * @return string
     */
    public function getBialStatusMsg()
    {
        return $this->bialStatusMsg;
    }

    /**
     * Set bialCountProductsNew
     *
     * @param integer $bialCountProductsNew
     *
     * @return BrandsImportActLog
     */
    public function setBialCountProductsNew($bialCountProductsNew)
    {
        $this->bialCountProductsNew = $bialCountProductsNew;

        return $this;
    }

    /**
     * Get bialCountProductsNew
     *
     * @return integer
     */
    public function getBialCountProductsNew()
    {
        return $this->bialCountProductsNew;
    }

    /**
     * Set bialCountProductsUpdated
     *
     * @param integer $bialCountProductsUpdated
     *
     * @return BrandsImportActLog
     */
    public function setBialCountProductsUpdated($bialCountProductsUpdated)
    {
        $this->bialCountProductsUpdated = $bialCountProductsUpdated;

        return $this;
    }

    /**
     * Get bialCountProductsUpdated
     *
     * @return integer
     */
    public function getBialCountProductsUpdated()
    {
        return $this->bialCountProductsUpdated;
    }

    /**
     * Set bialCountProductsDeleted
     *
     * @param integer $bialCountProductsDeleted
     *
     * @return BrandsImportActLog
     */
    public function setBialCountProductsDeleted($bialCountProductsDeleted)
    {
        $this->bialCountProductsDeleted = $bialCountProductsDeleted;

        return $this;
    }

    /**
     * Get bialCountProductsDeleted
     *
     * @return integer
     */
    public function getBialCountProductsDeleted()
    {
        return $this->bialCountProductsDeleted;
    }

    /**
     * Set bialAddtime
     *
     * @param integer $bialAddtime
     *
     * @return BrandsImportActLog
     */
    public function setBialAddtime($bialAddtime)
    {
        $this->bialAddtime = $bialAddtime;

        return $this;
    }

    /**
     * Get bialAddtime
     *
     * @return integer
     */
    public function getBialAddtime()
    {
        return $this->bialAddtime;
    }

    /**
     * Set bialLastmodified
     *
     * @param integer $bialLastmodified
     *
     * @return BrandsImportActLog
     */
    public function setBialLastmodified($bialLastmodified)
    {
        $this->bialLastmodified = $bialLastmodified;

        return $this;
    }

    /**
     * Get bialLastmodified
     *
     * @return integer
     */
    public function getBialLastmodified()
    {
        return $this->bialLastmodified;
    }

    /**
     * Get bialId
     *
     * @return integer
     */
    public function getBialId()
    {
        return $this->bialId;
    }

    /**
     * Set bialBrandImportDlLog
     *
     * @param \AppBundle\Entity\BrandsImportDlLog $bialBrandImportDlLog
     *
     * @return BrandsImportActLog
     */
    public function setBialBrandImportDlLog(\AppBundle\Entity\BrandsImportDlLog $bialBrandImportDlLog = null)
    {
        $this->bialBrandImportDlLog = $bialBrandImportDlLog;

        return $this;
    }

    /**
     * Get bialBrandImportDlLog
     *
     * @return \AppBundle\Entity\BrandsImportDlLog
     */
    public function getBialBrandImportDlLog()
    {
        return $this->bialBrandImportDlLog;
    }

    /**
     * Set bialBrand
     *
     * @param \AppBundle\Entity\Brands $bialBrand
     *
     * @return BrandsImportActLog
     */
    public function setBialBrand(\AppBundle\Entity\Brands $bialBrand = null)
    {
        $this->bialBrand = $bialBrand;

        return $this;
    }

    /**
     * Get bialBrand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBialBrand()
    {
        return $this->bialBrand;
    }
}
