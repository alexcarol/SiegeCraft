<?php

namespace TS\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fortress
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fortress
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var array
     *
     * @ORM\Column(name="technologies", type="simple_array")
     */
    private $technologies = array();


    /**
     * @var Building
     *
     * @ORM\OneToMany(targetEntity="Building", mappedBy="fortress")
     */
    private $buildings;

    /**
     * @var Node
     *
     * @ORM\OneToMany(targetEntity="Node", mappedBy="fortress")
     */
    private $nodes;

    /**
     * @var Player
     *
     * @ORM\OneToOne(targetEntity="Player", mappedBy="fortress")
     */
    private $player;

    /**
     * @var Region
     *
     * @ORM\OneToOne(targetEntity="Region", mappedBy="fortress")
     */
    private $region;

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
     * @return Fortress
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
     * Set description
     *
     * @param string $description
     * @return Fortress
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set technologies
     *
     * @param array $technologies
     * @return Fortress
     */
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->buildings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nodes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add buildings
     *
     * @param Building $buildings
     * @return Fortress
     */
    public function addBuilding(Building $buildings)
    {
        $this->buildings[] = $buildings;
    
        return $this;
    }

    /**
     * Remove buildings
     *
     * @param Building $buildings
     */
    public function removeBuilding(Building $buildings)
    {
        $this->buildings->removeElement($buildings);
    }

    /**
     * Get buildings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBuildings()
    {
        return $this->buildings;
    }

    /**
     * Add nodes
     *
     * @param Node $nodes
     * @return Fortress
     */
    public function addNode(Node $nodes)
    {
        $this->nodes[] = $nodes;
    
        return $this;
    }

    /**
     * Remove nodes
     *
     * @param Node $nodes
     */
    public function removeNode(Node $nodes)
    {
        $this->nodes->removeElement($nodes);
    }

    /**
     * Get nodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNodes()
    {
        return $this->nodes;
    }

    /**
     * Set player
     *
     * @param Player $player
     * @return Fortress
     */
    public function setPlayer(Player $player = null)
    {
        $this->player = $player;
    
        return $this;
    }

    /**
     * Get player
     *
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set region
     *
     * @param Region $region
     * @return Fortress
     */
    public function setRegion(Region $region = null)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }
}