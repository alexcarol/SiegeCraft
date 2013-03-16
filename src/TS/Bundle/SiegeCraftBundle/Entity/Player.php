<?php

namespace TS\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Player
{
    use Traits\Resources;

    /**
     * @var User
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="\TS\Bundle\UserBundle\Entity\User")
     */
    private $user;

    /**
     *
     * @ORM\OneToOne(targetEntity="Fortress", inversedBy="player")
     */
    private $fortress;

    /**
     * @var array
     * TODO create technologies
     * ORM\Column(name="technologies", type="")
     */
    private $technologies = array();

    /**
     * @ORM\OneToMany(targetEntity="Unit", mappedBy="player")
     */
    private $units;

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
     * Constructor
     */
    public function __construct()
    {
        $this->units = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->technologies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->resources = array(
            'p' => 100,
            'q' => 100,
            'a' => 100,
        );
    }

    /**
     * Set fortress
     *
     * @param Fortress $fortress
     * @return Player
     */
    public function setFortress(Fortress $fortress = null)
    {
        $this->fortress = $fortress;

        return $this;
    }

    /**
     * Get fortress
     *
     * @return Fortress
     */
    public function getFortress()
    {
        return $this->fortress;
    }

    /**
     * Add units
     *
     * @param Unit $units
     * @return Player
     */
    public function addUnit(Unit $units)
    {
        $this->units[] = $units;

        return $this;
    }

    /**
     * Remove units
     *
     * @param Unit $units
     */
    public function removeUnit(Unit $units)
    {
        $this->units->removeElement($units);
    }

    /**
     * Get units
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set user
     *
     * @param \TS\Bundle\UserBundle\Entity\User $user
     * @return Player
     */
    public function setUser(\TS\Bundle\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TS\Bundle\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }


    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;

        return $this;
    }

    /**
     * Get technologies
     *
     * @return array
     */
    public function getTechnologies()
    {
        return $this->technologies;
    }
}