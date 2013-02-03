<?php

namespace TentacleSoft\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Unit
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
     * @ORM\Column(name="configId", type="integer")
     */
    private $configId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="idle", type="boolean")
     */
    private $idle;

    /**
     * @ORM\ManyToOne(targetEntity="Node", inversedBy="units")
     */
    private $node;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="units")
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
     * Set configId
     *
     * @param integer $configId
     * @return Unit
     */
    public function setConfigId($configId)
    {
        $this->configId = $configId;
    
        return $this;
    }

    /**
     * Get configId
     *
     * @return integer 
     */
    public function getConfigId()
    {
        return $this->configId;
    }

    /**
     * Set idle
     *
     * @param boolean $idle
     * @return Unit
     */
    public function setIdle($idle)
    {
        $this->idle = $idle;
    
        return $this;
    }

    /**
     * Get idle
     *
     * @return boolean 
     */
    public function getIdle()
    {
        return $this->idle;
    }

    /**
     * Set node
     *
     * @param \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Node $node
     * @return Unit
     */
    public function setNode(\TentacleSoft\Bundle\SiegeCraftBundle\Entity\Node $node = null)
    {
        $this->node = $node;
    
        return $this;
    }

    /**
     * Get node
     *
     * @return \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Node 
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * Set player
     *
     * @param \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Player $player
     * @return Unit
     */
    public function setPlayer(\TentacleSoft\Bundle\SiegeCraftBundle\Entity\Player $player = null)
    {
        $this->player = $player;
    
        return $this;
    }

    /**
     * Get player
     *
     * @return \TentacleSoft\Bundle\SiegeCraftBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}