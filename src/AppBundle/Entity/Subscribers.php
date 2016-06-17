<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscribers
 *
 * @ORM\Table(name="subscribers", uniqueConstraints={@ORM\UniqueConstraint(name="subscr_email", columns={"subscr_email"})}, indexes={@ORM\Index(name="subscr_addtime", columns={"subscr_addtime"}), @ORM\Index(name="subscr_ip", columns={"subscr_ip"})})
 * @ORM\Entity
 */
class Subscribers
{
    /**
     * @var string
     *
     * @ORM\Column(name="subscr_email", type="string", length=128, nullable=false)
     */
    private $subscrEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="subscr_ip", type="string", length=32, nullable=false)
     */
    private $subscrIp;

    /**
     * @var string
     *
     * @ORM\Column(name="subscr_remove_key", type="string", length=128, nullable=false)
     */
    private $subscrRemoveKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="subscr_sent_count", type="integer", nullable=false)
     */
    private $subscrSentCount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="subscr_addtime", type="integer", nullable=false)
     */
    private $subscrAddtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="subscr_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subscrId;


}

