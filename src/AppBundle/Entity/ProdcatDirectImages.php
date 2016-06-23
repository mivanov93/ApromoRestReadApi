<?php

namespace AppBundle\Entity;

/**
 * ProdcatDirectImages
 */
class ProdcatDirectImages
{
    /**
     * @var string
     */
    private $pdiImageUrl;

    /**
     * @var integer
     */
    private $pdiImageUrlHash = '0';

    /**
     * @var integer
     */
    private $pdiDlImageHash = '0';

    /**
     * @var integer
     */
    private $pdiDlStart = '0';

    /**
     * @var integer
     */
    private $pdiDlEnd = '0';

    /**
     * @var integer
     */
    private $pdiDlStatusCode = '0';

    /**
     * @var string
     */
    private $pdiDlStatusMsg = '';

    /**
     * @var integer
     */
    private $pdiResizeImageHash = '0';

    /**
     * @var integer
     */
    private $pdiResizeStart = '0';

    /**
     * @var integer
     */
    private $pdiResizeEnd = '0';

    /**
     * @var integer
     */
    private $pdiResizeStatusCode = '0';

    /**
     * @var string
     */
    private $pdiResizeStatusMsg = '';

    /**
     * @var integer
     */
    private $pdiAddtime;

    /**
     * @var integer
     */
    private $pdiLastmodified;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $pdiProdcat;


    /**
     * Set pdiImageUrl
     *
     * @param string $pdiImageUrl
     *
     * @return ProdcatDirectImages
     */
    public function setPdiImageUrl($pdiImageUrl)
    {
        $this->pdiImageUrl = $pdiImageUrl;

        return $this;
    }

    /**
     * Get pdiImageUrl
     *
     * @return string
     */
    public function getPdiImageUrl()
    {
        return $this->pdiImageUrl;
    }

    /**
     * Set pdiImageUrlHash
     *
     * @param integer $pdiImageUrlHash
     *
     * @return ProdcatDirectImages
     */
    public function setPdiImageUrlHash($pdiImageUrlHash)
    {
        $this->pdiImageUrlHash = $pdiImageUrlHash;

        return $this;
    }

    /**
     * Get pdiImageUrlHash
     *
     * @return integer
     */
    public function getPdiImageUrlHash()
    {
        return $this->pdiImageUrlHash;
    }

    /**
     * Set pdiDlImageHash
     *
     * @param integer $pdiDlImageHash
     *
     * @return ProdcatDirectImages
     */
    public function setPdiDlImageHash($pdiDlImageHash)
    {
        $this->pdiDlImageHash = $pdiDlImageHash;

        return $this;
    }

    /**
     * Get pdiDlImageHash
     *
     * @return integer
     */
    public function getPdiDlImageHash()
    {
        return $this->pdiDlImageHash;
    }

    /**
     * Set pdiDlStart
     *
     * @param integer $pdiDlStart
     *
     * @return ProdcatDirectImages
     */
    public function setPdiDlStart($pdiDlStart)
    {
        $this->pdiDlStart = $pdiDlStart;

        return $this;
    }

    /**
     * Get pdiDlStart
     *
     * @return integer
     */
    public function getPdiDlStart()
    {
        return $this->pdiDlStart;
    }

    /**
     * Set pdiDlEnd
     *
     * @param integer $pdiDlEnd
     *
     * @return ProdcatDirectImages
     */
    public function setPdiDlEnd($pdiDlEnd)
    {
        $this->pdiDlEnd = $pdiDlEnd;

        return $this;
    }

    /**
     * Get pdiDlEnd
     *
     * @return integer
     */
    public function getPdiDlEnd()
    {
        return $this->pdiDlEnd;
    }

    /**
     * Set pdiDlStatusCode
     *
     * @param integer $pdiDlStatusCode
     *
     * @return ProdcatDirectImages
     */
    public function setPdiDlStatusCode($pdiDlStatusCode)
    {
        $this->pdiDlStatusCode = $pdiDlStatusCode;

        return $this;
    }

    /**
     * Get pdiDlStatusCode
     *
     * @return integer
     */
    public function getPdiDlStatusCode()
    {
        return $this->pdiDlStatusCode;
    }

    /**
     * Set pdiDlStatusMsg
     *
     * @param string $pdiDlStatusMsg
     *
     * @return ProdcatDirectImages
     */
    public function setPdiDlStatusMsg($pdiDlStatusMsg)
    {
        $this->pdiDlStatusMsg = $pdiDlStatusMsg;

        return $this;
    }

    /**
     * Get pdiDlStatusMsg
     *
     * @return string
     */
    public function getPdiDlStatusMsg()
    {
        return $this->pdiDlStatusMsg;
    }

    /**
     * Set pdiResizeImageHash
     *
     * @param integer $pdiResizeImageHash
     *
     * @return ProdcatDirectImages
     */
    public function setPdiResizeImageHash($pdiResizeImageHash)
    {
        $this->pdiResizeImageHash = $pdiResizeImageHash;

        return $this;
    }

    /**
     * Get pdiResizeImageHash
     *
     * @return integer
     */
    public function getPdiResizeImageHash()
    {
        return $this->pdiResizeImageHash;
    }

    /**
     * Set pdiResizeStart
     *
     * @param integer $pdiResizeStart
     *
     * @return ProdcatDirectImages
     */
    public function setPdiResizeStart($pdiResizeStart)
    {
        $this->pdiResizeStart = $pdiResizeStart;

        return $this;
    }

    /**
     * Get pdiResizeStart
     *
     * @return integer
     */
    public function getPdiResizeStart()
    {
        return $this->pdiResizeStart;
    }

    /**
     * Set pdiResizeEnd
     *
     * @param integer $pdiResizeEnd
     *
     * @return ProdcatDirectImages
     */
    public function setPdiResizeEnd($pdiResizeEnd)
    {
        $this->pdiResizeEnd = $pdiResizeEnd;

        return $this;
    }

    /**
     * Get pdiResizeEnd
     *
     * @return integer
     */
    public function getPdiResizeEnd()
    {
        return $this->pdiResizeEnd;
    }

    /**
     * Set pdiResizeStatusCode
     *
     * @param integer $pdiResizeStatusCode
     *
     * @return ProdcatDirectImages
     */
    public function setPdiResizeStatusCode($pdiResizeStatusCode)
    {
        $this->pdiResizeStatusCode = $pdiResizeStatusCode;

        return $this;
    }

    /**
     * Get pdiResizeStatusCode
     *
     * @return integer
     */
    public function getPdiResizeStatusCode()
    {
        return $this->pdiResizeStatusCode;
    }

    /**
     * Set pdiResizeStatusMsg
     *
     * @param string $pdiResizeStatusMsg
     *
     * @return ProdcatDirectImages
     */
    public function setPdiResizeStatusMsg($pdiResizeStatusMsg)
    {
        $this->pdiResizeStatusMsg = $pdiResizeStatusMsg;

        return $this;
    }

    /**
     * Get pdiResizeStatusMsg
     *
     * @return string
     */
    public function getPdiResizeStatusMsg()
    {
        return $this->pdiResizeStatusMsg;
    }

    /**
     * Set pdiAddtime
     *
     * @param integer $pdiAddtime
     *
     * @return ProdcatDirectImages
     */
    public function setPdiAddtime($pdiAddtime)
    {
        $this->pdiAddtime = $pdiAddtime;

        return $this;
    }

    /**
     * Get pdiAddtime
     *
     * @return integer
     */
    public function getPdiAddtime()
    {
        return $this->pdiAddtime;
    }

    /**
     * Set pdiLastmodified
     *
     * @param integer $pdiLastmodified
     *
     * @return ProdcatDirectImages
     */
    public function setPdiLastmodified($pdiLastmodified)
    {
        $this->pdiLastmodified = $pdiLastmodified;

        return $this;
    }

    /**
     * Get pdiLastmodified
     *
     * @return integer
     */
    public function getPdiLastmodified()
    {
        return $this->pdiLastmodified;
    }

    /**
     * Set pdiProdcat
     *
     * @param \AppBundle\Entity\Prodcat $pdiProdcat
     *
     * @return ProdcatDirectImages
     */
    public function setPdiProdcat(\AppBundle\Entity\Prodcat $pdiProdcat)
    {
        $this->pdiProdcat = $pdiProdcat;

        return $this;
    }

    /**
     * Get pdiProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getPdiProdcat()
    {
        return $this->pdiProdcat;
    }
}
