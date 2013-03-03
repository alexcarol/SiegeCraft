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
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="\TS\Bundle\UserBundle\Entity\User", inversedBy="player")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="resources", type="array")
     */
    private $resources;

    /**
     *
     * @ORM\OneToOne(targetEntity="Fortress", inversedBy="player")
     */
    private $fortress;

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
     * Set name
     *
     * @param string $name
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->units = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add resources
     *
     * @param Resource $resources
     * @return Player
     */
    public function addResource(Resource $resources)
    {
        $this->resources[] = $resources;

        return $this;
    }

    /**
     * Remove resources
     *
     * @param Resource $resources
     */
    public function removeResource(Resource $resources)
    {
        $this->resources->removeElement($resources);
    }

    /**
     * Get resources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResources()
    {
        return $this->resources;
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
     * Set resources
     *
     * @param array $resources
     * @return Player
     */
    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
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
}