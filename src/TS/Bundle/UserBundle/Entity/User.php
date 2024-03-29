<?php

namespace TS\Bundle\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="web_user")
 */
class User extends BaseUser {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="\TS\Bundle\SiegeCraftBundle\Entity\Player", mappedBy="user", fetch="EAGER")
     * @var Player
     */
    private $player;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set player
     *
     * @param \TS\Bundle\SiegeCraftBundle\Entity\Player $player
     * @return User
     */
    public function setPlayer(\TS\Bundle\SiegeCraftBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \TS\Bundle\SiegeCraftBundle\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}