<?php

namespace TS\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TS\Bundle\SiegeCraftBundle\Repository\Region")
 */
class Region
{
    /**
     * @var integer is a value beetween 0 and N_REGIONS in the zone
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var Fortress
     * @ORM\OneToOne(targetEntity="Fortress", inversedBy="region")
     */
    private $fortress;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Zone", inversedBy="regions")
     */
    private $zone;

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
     * Set id
     *
     * @param integer $id
     * @return Region
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Set fortress
     *
     * @param Fortress $fortress
     * @return Region
     */
    public function setFortress(Fortress $fortress)
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
     * Set zone
     *
     * @param Zone $zone
     * @return Region
     */
    public function setZone(Zone $zone = null)
    {
        $this->zone = $zone;
    
        return $this;
    }

    /**
     * Get zone
     *
     * @return Zone
     */
    public function getZone()
    {
        return $this->zone;
    }
}