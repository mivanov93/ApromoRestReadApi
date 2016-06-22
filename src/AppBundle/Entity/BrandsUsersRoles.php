<?php

namespace AppBundle\Entity;

/**
 * BrandsUsersRoles
 */
class BrandsUsersRoles
{
    /**
     * @var string
     */
    private $buRoleName;

    /**
     * @var integer
     */
    private $buRoleLevel;


    /**
     * Set buRoleName
     *
     * @param string $buRoleName
     *
     * @return BrandsUsersRoles
     */
    public function setBuRoleName($buRoleName)
    {
        $this->buRoleName = $buRoleName;

        return $this;
    }

    /**
     * Get buRoleName
     *
     * @return string
     */
    public function getBuRoleName()
    {
        return $this->buRoleName;
    }

    /**
     * Get buRoleLevel
     *
     * @return integer
     */
    public function getBuRoleLevel()
    {
        return $this->buRoleLevel;
    }
}

