<?php

namespace TS\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ConfigBuilding
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ConfigBuilding
{
    use Traits\Costs;

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
     * @GEDMO\Translatable
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="multiplier", type="float")
     */
    private $multiplier;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="ConfigBuildingLevel", mappedBy="configBuilding")
     */
    private $levels;

    public function __toString()
    {
        return $this->id . ' : ' . $this->name;
    }

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
     * @return ConfigBuilding
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
     * @return ConfigBuilding
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
     * Set multiplier
     *
     * @param float $multiplier
     * @return ConfigBuilding
     */
    public function setMultiplier($multiplier)
    {
        $this->multiplier = $multiplier;

        return $this;
    }

    /**
     * Get multiplier
     *
     * @return float
     */
    public function getMultiplier()
    {
        return $this->multiplier;
    }

    /**
     * Constructor
     */

    public function __construct()
    {
    }

    /**
     * Add levels
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $levels
     * @return ConfigBuilding
     */
    public function addLevel(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $levels)
    {
        $this->levels[] = $levels;
    
        return $this;
    }

    /**
     * Remove levels
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $levels
     */
    public function removeLevel(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $levels)
    {
        $this->levels->removeElement($levels);
    }

    /**
     * Get levels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLevels()
    {
        return $this->levels;
    }
}