<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandsUsersRoles
 *
 * @ORM\Table(name="brands_users_roles")
 * @ORM\Entity
 */
class BrandsUsersRoles
{
    /**
     * @var string
     *
     * @ORM\Column(name="bu_role_name", type="string", length=32, nullable=false)
     */
    private $buRoleName;

    /**
     * @var integer
     *
     * @ORM\Column(name="bu_role_level", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $buRoleLevel;


}

