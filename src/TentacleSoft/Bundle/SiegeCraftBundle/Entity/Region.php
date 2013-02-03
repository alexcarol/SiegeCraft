<?php

namespace TentacleSoft\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Fortress")
     */
    private $fortress;

    /**
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
     * @param \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Fortress $fortress
     * @return Region
     */
    public function setFortress(\TentacleSoft\Bundle\SiegeCraftBundle\Entity\Fortress $fortress)
    {
        $this->fortress = $fortress;
    
        return $this;
    }

    /**
     * Get fortress
     *
     * @return \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Fortress 
     */
    public function getFortress()
    {
        return $this->fortress;
    }

    /**
     * Set zone
     *
     * @param \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Zone $zone
     * @return Region
     */
    public function setZone(\TentacleSoft\Bundle\SiegeCraftBundle\Entity\Zone $zone = null)
    {
        $this->zone = $zone;
    
        return $this;
    }

    /**
     * Get zone
     *
     * @return \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Zone 
     */
    public function getZone()
    {
        return $this->zone;
    }
}