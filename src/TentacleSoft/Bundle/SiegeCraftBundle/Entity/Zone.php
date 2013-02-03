<?php

namespace TentacleSoft\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zone
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Zone
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
     * @ORM\OneToMany(targetEntity="Region", mappedBy="zone")
     */
    private $regions;

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
        $this->regions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add regions
     *
     * @param \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Region $regions
     * @return Zone
     */
    public function addRegion(\TentacleSoft\Bundle\SiegeCraftBundle\Entity\Region $regions)
    {
        $this->regions[] = $regions;
    
        return $this;
    }

    /**
     * Remove regions
     *
     * @param \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Region $regions
     */
    public function removeRegion(\TentacleSoft\Bundle\SiegeCraftBundle\Entity\Region $regions)
    {
        $this->regions->removeElement($regions);
    }

    /**
     * Get regions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegions()
    {
        return $this->regions;
    }
}