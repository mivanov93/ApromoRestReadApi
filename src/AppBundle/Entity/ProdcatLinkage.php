<?php

namespace AppBundle\Entity;

/**
 * ProdcatLinkage
 */
class ProdcatLinkage
{
    /**
     * @var string
     */
    private $plIndirParsIds = '[]';

    /**
     * @var string
     */
    private $testParsIds = '[]';

    /**
     * @var integer
     */
    private $plPrcount = '0';

    /**
     * @var integer
     */
    private $plIndirPrcount = '0';

    /**
     * @var integer
     */
    private $plAddtime = '0';

    /**
     * @var integer
     */
    private $plLastmodified;

    /**
     * @var \AppBundle\Entity\Prodcat
     */
    private $plProdcat;


    /**
     * Set plIndirParsIds
     *
     * @param string $plIndirParsIds
     *
     * @return ProdcatLinkage
     */
    public function setPlIndirParsIds($plIndirParsIds)
    {
        $this->plIndirParsIds = $plIndirParsIds;

        return $this;
    }

    /**
     * Get plIndirParsIds
     *
     * @return string
     */
    public function getPlIndirParsIds()
    {
        return $this->plIndirParsIds;
    }

    /**
     * Set testParsIds
     *
     * @param string $testParsIds
     *
     * @return ProdcatLinkage
     */
    public function setTestParsIds($testParsIds)
    {
        $this->testParsIds = $testParsIds;

        return $this;
    }

    /**
     * Get testParsIds
     *
     * @return string
     */
    public function getTestParsIds()
    {
        return $this->testParsIds;
    }

    /**
     * Set plPrcount
     *
     * @param integer $plPrcount
     *
     * @return ProdcatLinkage
     */
    public function setPlPrcount($plPrcount)
    {
        $this->plPrcount = $plPrcount;

        return $this;
    }

    /**
     * Get plPrcount
     *
     * @return integer
     */
    public function getPlPrcount()
    {
        return $this->plPrcount;
    }

    /**
     * Set plIndirPrcount
     *
     * @param integer $plIndirPrcount
     *
     * @return ProdcatLinkage
     */
    public function setPlIndirPrcount($plIndirPrcount)
    {
        $this->plIndirPrcount = $plIndirPrcount;

        return $this;
    }

    /**
     * Get plIndirPrcount
     *
     * @return integer
     */
    public function getPlIndirPrcount()
    {
        return $this->plIndirPrcount;
    }

    /**
     * Set plAddtime
     *
     * @param integer $plAddtime
     *
     * @return ProdcatLinkage
     */
    public function setPlAddtime($plAddtime)
    {
        $this->plAddtime = $plAddtime;

        return $this;
    }

    /**
     * Get plAddtime
     *
     * @return integer
     */
    public function getPlAddtime()
    {
        return $this->plAddtime;
    }

    /**
     * Set plLastmodified
     *
     * @param integer $plLastmodified
     *
     * @return ProdcatLinkage
     */
    public function setPlLastmodified($plLastmodified)
    {
        $this->plLastmodified = $plLastmodified;

        return $this;
    }

    /**
     * Get plLastmodified
     *
     * @return integer
     */
    public function getPlLastmodified()
    {
        return $this->plLastmodified;
    }

    /**
     * Set plProdcat
     *
     * @param \AppBundle\Entity\Prodcat $plProdcat
     *
     * @return ProdcatLinkage
     */
    public function setPlProdcat(\AppBundle\Entity\Prodcat $plProdcat)
    {
        $this->plProdcat = $plProdcat;

        return $this;
    }

    /**
     * Get plProdcat
     *
     * @return \AppBundle\Entity\Prodcat
     */
    public function getPlProdcat()
    {
        return $this->plProdcat;
    }
}

