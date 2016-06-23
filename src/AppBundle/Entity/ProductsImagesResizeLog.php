<?php

namespace AppBundle\Entity;

/**
 * ProductsImagesResizeLog
 */
class ProductsImagesResizeLog
{
    /**
     * @var integer
     */
    private $pirlStart = '0';

    /**
     * @var integer
     */
    private $pirlEnd = '0';

    /**
     * @var integer
     */
    private $pirlStatusCode = '0';

    /**
     * @var string
     */
    private $pirlStatusMsg = '';

    /**
     * @var integer
     */
    private $pirlAddtime = '0';

    /**
     * @var integer
     */
    private $pirlLastmodified = '0';

    /**
     * @var integer
     */
    private $pirlId;

    /**
     * @var \AppBundle\Entity\ProductsImagesDlLog
     */
    private $pirlProductsImageDlLog;


    /**
     * Set pirlStart
     *
     * @param integer $pirlStart
     *
     * @return ProductsImagesResizeLog
     */
    public function setPirlStart($pirlStart)
    {
        $this->pirlStart = $pirlStart;

        return $this;
    }

    /**
     * Get pirlStart
     *
     * @return integer
     */
    public function getPirlStart()
    {
        return $this->pirlStart;
    }

    /**
     * Set pirlEnd
     *
     * @param integer $pirlEnd
     *
     * @return ProductsImagesResizeLog
     */
    public function setPirlEnd($pirlEnd)
    {
        $this->pirlEnd = $pirlEnd;

        return $this;
    }

    /**
     * Get pirlEnd
     *
     * @return integer
     */
    public function getPirlEnd()
    {
        return $this->pirlEnd;
    }

    /**
     * Set pirlStatusCode
     *
     * @param integer $pirlStatusCode
     *
     * @return ProductsImagesResizeLog
     */
    public function setPirlStatusCode($pirlStatusCode)
    {
        $this->pirlStatusCode = $pirlStatusCode;

        return $this;
    }

    /**
     * Get pirlStatusCode
     *
     * @return integer
     */
    public function getPirlStatusCode()
    {
        return $this->pirlStatusCode;
    }

    /**
     * Set pirlStatusMsg
     *
     * @param string $pirlStatusMsg
     *
     * @return ProductsImagesResizeLog
     */
    public function setPirlStatusMsg($pirlStatusMsg)
    {
        $this->pirlStatusMsg = $pirlStatusMsg;

        return $this;
    }

    /**
     * Get pirlStatusMsg
     *
     * @return string
     */
    public function getPirlStatusMsg()
    {
        return $this->pirlStatusMsg;
    }

    /**
     * Set pirlAddtime
     *
     * @param integer $pirlAddtime
     *
     * @return ProductsImagesResizeLog
     */
    public function setPirlAddtime($pirlAddtime)
    {
        $this->pirlAddtime = $pirlAddtime;

        return $this;
    }

    /**
     * Get pirlAddtime
     *
     * @return integer
     */
    public function getPirlAddtime()
    {
        return $this->pirlAddtime;
    }

    /**
     * Set pirlLastmodified
     *
     * @param integer $pirlLastmodified
     *
     * @return ProductsImagesResizeLog
     */
    public function setPirlLastmodified($pirlLastmodified)
    {
        $this->pirlLastmodified = $pirlLastmodified;

        return $this;
    }

    /**
     * Get pirlLastmodified
     *
     * @return integer
     */
    public function getPirlLastmodified()
    {
        return $this->pirlLastmodified;
    }

    /**
     * Get pirlId
     *
     * @return integer
     */
    public function getPirlId()
    {
        return $this->pirlId;
    }

    /**
     * Set pirlProductsImageDlLog
     *
     * @param \AppBundle\Entity\ProductsImagesDlLog $pirlProductsImageDlLog
     *
     * @return ProductsImagesResizeLog
     */
    public function setPirlProductsImageDlLog(\AppBundle\Entity\ProductsImagesDlLog $pirlProductsImageDlLog = null)
    {
        $this->pirlProductsImageDlLog = $pirlProductsImageDlLog;

        return $this;
    }

    /**
     * Get pirlProductsImageDlLog
     *
     * @return \AppBundle\Entity\ProductsImagesDlLog
     */
    public function getPirlProductsImageDlLog()
    {
        return $this->pirlProductsImageDlLog;
    }
}
