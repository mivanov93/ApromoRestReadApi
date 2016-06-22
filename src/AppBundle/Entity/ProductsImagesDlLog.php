<?php

namespace AppBundle\Entity;

/**
 * ProductsImagesDlLog
 */
class ProductsImagesDlLog
{
    /**
     * @var integer
     */
    private $pidlStart = '0';

    /**
     * @var integer
     */
    private $pidlEnd = '0';

    /**
     * @var integer
     */
    private $pidlStatusCode = '0';

    /**
     * @var string
     */
    private $pidlStatusMsg = '';

    /**
     * @var integer
     */
    private $pidlFileSize = '0';

    /**
     * @var integer
     */
    private $pidlFileHash = '0';

    /**
     * @var integer
     */
    private $pidlFileUrlHash = '0';

    /**
     * @var integer
     */
    private $pidlAddtime = '0';

    /**
     * @var integer
     */
    private $pidlLastmodified = '0';

    /**
     * @var integer
     */
    private $pidlId;

    /**
     * @var \AppBundle\Entity\ProductsImages
     */
    private $pidlProductsImage;


    /**
     * Set pidlStart
     *
     * @param integer $pidlStart
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlStart($pidlStart)
    {
        $this->pidlStart = $pidlStart;

        return $this;
    }

    /**
     * Get pidlStart
     *
     * @return integer
     */
    public function getPidlStart()
    {
        return $this->pidlStart;
    }

    /**
     * Set pidlEnd
     *
     * @param integer $pidlEnd
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlEnd($pidlEnd)
    {
        $this->pidlEnd = $pidlEnd;

        return $this;
    }

    /**
     * Get pidlEnd
     *
     * @return integer
     */
    public function getPidlEnd()
    {
        return $this->pidlEnd;
    }

    /**
     * Set pidlStatusCode
     *
     * @param integer $pidlStatusCode
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlStatusCode($pidlStatusCode)
    {
        $this->pidlStatusCode = $pidlStatusCode;

        return $this;
    }

    /**
     * Get pidlStatusCode
     *
     * @return integer
     */
    public function getPidlStatusCode()
    {
        return $this->pidlStatusCode;
    }

    /**
     * Set pidlStatusMsg
     *
     * @param string $pidlStatusMsg
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlStatusMsg($pidlStatusMsg)
    {
        $this->pidlStatusMsg = $pidlStatusMsg;

        return $this;
    }

    /**
     * Get pidlStatusMsg
     *
     * @return string
     */
    public function getPidlStatusMsg()
    {
        return $this->pidlStatusMsg;
    }

    /**
     * Set pidlFileSize
     *
     * @param integer $pidlFileSize
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlFileSize($pidlFileSize)
    {
        $this->pidlFileSize = $pidlFileSize;

        return $this;
    }

    /**
     * Get pidlFileSize
     *
     * @return integer
     */
    public function getPidlFileSize()
    {
        return $this->pidlFileSize;
    }

    /**
     * Set pidlFileHash
     *
     * @param integer $pidlFileHash
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlFileHash($pidlFileHash)
    {
        $this->pidlFileHash = $pidlFileHash;

        return $this;
    }

    /**
     * Get pidlFileHash
     *
     * @return integer
     */
    public function getPidlFileHash()
    {
        return $this->pidlFileHash;
    }

    /**
     * Set pidlFileUrlHash
     *
     * @param integer $pidlFileUrlHash
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlFileUrlHash($pidlFileUrlHash)
    {
        $this->pidlFileUrlHash = $pidlFileUrlHash;

        return $this;
    }

    /**
     * Get pidlFileUrlHash
     *
     * @return integer
     */
    public function getPidlFileUrlHash()
    {
        return $this->pidlFileUrlHash;
    }

    /**
     * Set pidlAddtime
     *
     * @param integer $pidlAddtime
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlAddtime($pidlAddtime)
    {
        $this->pidlAddtime = $pidlAddtime;

        return $this;
    }

    /**
     * Get pidlAddtime
     *
     * @return integer
     */
    public function getPidlAddtime()
    {
        return $this->pidlAddtime;
    }

    /**
     * Set pidlLastmodified
     *
     * @param integer $pidlLastmodified
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlLastmodified($pidlLastmodified)
    {
        $this->pidlLastmodified = $pidlLastmodified;

        return $this;
    }

    /**
     * Get pidlLastmodified
     *
     * @return integer
     */
    public function getPidlLastmodified()
    {
        return $this->pidlLastmodified;
    }

    /**
     * Get pidlId
     *
     * @return integer
     */
    public function getPidlId()
    {
        return $this->pidlId;
    }

    /**
     * Set pidlProductsImage
     *
     * @param \AppBundle\Entity\ProductsImages $pidlProductsImage
     *
     * @return ProductsImagesDlLog
     */
    public function setPidlProductsImage(\AppBundle\Entity\ProductsImages $pidlProductsImage = null)
    {
        $this->pidlProductsImage = $pidlProductsImage;

        return $this;
    }

    /**
     * Get pidlProductsImage
     *
     * @return \AppBundle\Entity\ProductsImages
     */
    public function getPidlProductsImage()
    {
        return $this->pidlProductsImage;
    }
}

