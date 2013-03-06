<?php

namespace TS\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigBuildingLevel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ConfigBuildingLevel
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
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;
    
    /**
     * @ORM\ManyToOne(targetEntity="ConfigBuilding", inversedBy="levels")
     */
    private $configBuilding;
    
    /**
     * @ORM\ManyToMany(targetEntity="ConfigBuildingLevel", mappedBy="requiredBuildings")
     */
    private $isRequiredByBuildings;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigBuildingLevel", inversedBy="isRequiredByBuildings")
     * @ORM\JoinTable(name="building_building_requirements",
     *      joinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="required_building_id", referencedColumnName="id")}
     *      )
     */
    private $requiredBuildings;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnologyLevel", mappedBy="isRequiredByBuildings")
     * @ORM\JoinTable(name="building_technology_requirements",
     *      joinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")}
     *      )
     */
    private $requiredTechnologies;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigBuildingLevel", inversedBy="requiredBuildings")
     * @ORM\JoinTable(name="technology_building_requirements",
     *      joinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")}
     *      )
     */
    private $isRequiredByTechnologies;

    /**
     * @ORM\OneToMany(targetEntity="ConfigUnit", mappedBy="building")
     */
    private $units;

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
     * @return ConfigBuildingLevel
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
     * @return ConfigBuildingLevel
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
     * @return ConfigBuildingLevel
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
        $this->isRequiredByBuildings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requiredBuildings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requiredTechnologies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->units = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add isRequiredByBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuilding
     * @return ConfigBuildingLevel
     */
    public function addIsRequiredByBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuilding)
    {
        $this->isRequiredByBuildings[] = $isRequiredByBuilding;

        return $this;
    }

    /**
     * Remove isRequiredByBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuilding
     */
    public function removeIsRequiredByBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuilding)
    {
        $this->isRequiredByBuildings->removeElement($isRequiredByBuilding);
    }

    /**
     * Get isRequiredByBuildings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIsRequiredByBuildings()
    {
        return $this->isRequiredByBuildings;
    }

    /**
     * Add requiredBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuilding
     * @return ConfigBuildingLevel
     */
    public function addRequiredBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuilding)
    {
        $this->requiredBuildings[] = $requiredBuilding;

        return $this;
    }

    /**
     * Remove requiredBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuilding
     */
    public function removeRequiredBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuilding)
    {
        $this->requiredBuildings->removeElement($requiredBuilding);
    }

    /**
     * Get requiredBuildings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequiredBuildings()
    {
        return $this->requiredBuildings;
    }

    /**
     * Add requiredTechnologies
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologie
     * @return ConfigBuildingLevel
     */
    public function addRequiredTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologie)
    {
        $this->requiredTechnologies[] = $requiredTechnologie;

        return $this;
    }

    /**
     * Remove requiredTechnologies
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologie
     */
    public function removeRequiredTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologie)
    {
        $this->requiredTechnologies->removeElement($requiredTechnologie);
    }

    /**
     * Get requiredTechnologies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequiredTechnologies()
    {
        return $this->requiredTechnologies;
    }

    /**
     * Add units
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigUnit $unit
     * @return ConfigBuildingLevel
     */
    public function addUnit(\TS\Bundle\GameConfigBundle\Entity\ConfigUnit $unit)
    {
        $this->units[] = $unit;

        return $this;
    }

    /**
     * Remove units
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigUnit $unit
     */
    public function removeUnit(\TS\Bundle\GameConfigBundle\Entity\ConfigUnit $unit)
    {
        $this->units->removeElement($unit);
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
     * Add isRequiredByTechnologies
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByTechnologies
     * @return ConfigBuildingLevel
     */
    public function addIsRequiredByTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByTechnologies)
    {
        $this->isRequiredByTechnologies[] = $isRequiredByTechnologies;
    
        return $this;
    }

    /**
     * Remove isRequiredByTechnologies
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByTechnologies
     */
    public function removeIsRequiredByTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByTechnologies)
    {
        $this->isRequiredByTechnologies->removeElement($isRequiredByTechnologies);
    }

    /**
     * Get isRequiredByTechnologies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIsRequiredByTechnologies()
    {
        return $this->isRequiredByTechnologies;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return ConfigBuildingLevel
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set configBuilding
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuilding $configBuilding
     * @return ConfigBuildingLevel
     */
    public function setConfigBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuilding $configBuilding = null)
    {
        $this->configBuilding = $configBuilding;
    
        return $this;
    }

    /**
     * Get configBuilding
     *
     * @return \TS\Bundle\GameConfigBundle\Entity\ConfigBuilding 
     */
    public function getConfigBuilding()
    {
        return $this->configBuilding;
    }
}