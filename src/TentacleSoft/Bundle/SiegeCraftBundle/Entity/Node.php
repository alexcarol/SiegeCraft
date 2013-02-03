<?php

namespace TentacleSoft\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Node
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Node
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
     * @var integer
     *
     * @ORM\Column(name="posX", type="smallint")
     */
    private $posX;

    /**
     * @var integer
     *
     * @ORM\Column(name="posY", type="smallint")
     */
    private $posY;

    /**
     * @ORM\ManyToOne(targetEntity="Fortress", inversedBy="nodes")
     */
    private $fortress;

    /**
     * @ORM\OneToMany(targetEntity="Unit", mappedBy="node")
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
     * Set posX
     *
     * @param integer $posX
     * @return Node
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;
    
        return $this;
    }

    /**
     * Get posX
     *
     * @return integer 
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set posY
     *
     * @param integer $posY
     * @return Node
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;
    
        return $this;
    }

    /**
     * Get posY
     *
     * @return integer 
     */
    public function getPosY()
    {
        return $this->posY;
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
     * @return Node
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
     * @return Node
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
}