<?php

namespace TS\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigTechnologyLevel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ConfigTechnologyLevel
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
     * @ORM\Column(name="level", type="integer")
     */
    private $level;
    
    /**
     * @ORM\ManyToOne(targetEntity="ConfigTechnology", inversedBy="levels")
     */
    private $configTechnology;
    
    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnologyLevel", mappedBy="requiredTechnologies")
     */
    private $isRequiredByTechnology;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnologyLevel", inversedBy="isRequiredByTechnologies")
     * @ORM\JoinTable(name="technology_technology_requirements",
     *      joinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="required_technology_id", referencedColumnName="id")}
     *      )
     */
    private $requiredTechnologies;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigBuildingLevel", inversedBy="requiredTechnologies")
     * @ORM\JoinTable(name="building_technology_requirements",
     *      joinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")}
     *      )
     */
    private $isRequiredByBuildings;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigBuildingLevel", mappedBy="isRequiredByTechnologies")
     * @ORM\JoinTable(name="technology_building_requirements",
     *      joinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")}
     *      )
     */
    private $requiredBuildings;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigUnit", inversedBy="isRequiredByTechnologies")
     * @ORM\JoinTable(name="technology_unit_requirements",
     *      joinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="unit_id", referencedColumnName="id")}
     *      )
     */

    private $isRequiredByUnits;

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
     * @return ConfigTechnologyLevel
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
        $this->isRequiredByTechnology = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requiredTechnologies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isRequiredByBuildings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isRequiredByUnits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add isRequiredByTechnology
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $isRequiredByTechnology
     * @return ConfigTechnologyLevel
     */
    public function addIsRequiredByTechnology(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $isRequiredByTechnology)
    {
        $this->isRequiredByTechnology[] = $isRequiredByTechnology;

        return $this;
    }

    /**
     * Remove isRequiredByTechnology
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $isRequiredByTechnology
     */
    public function removeIsRequiredByTechnology(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $isRequiredByTechnology)
    {
        $this->isRequiredByTechnology->removeElement($isRequiredByTechnology);
    }

    /**
     * Get isRequiredByTechnology
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIsRequiredByTechnology()
    {
        return $this->isRequiredByTechnology;
    }

    /**
     * Add requiredTechnologies
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologies
     * @return ConfigTechnologyLevel
     */
    public function addRequiredTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologies)
    {
        $this->requiredTechnologies[] = $requiredTechnologies;

        return $this;
    }

    /**
     * Remove requiredTechnologies
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologies
     */
    public function removeRequiredTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnologies)
    {
        $this->requiredTechnologies->removeElement($requiredTechnologies);
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
     * Add isRequiredByBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuildings
     * @return ConfigTechnologyLevel
     */
    public function addIsRequiredByBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuildings)
    {
        $this->isRequiredByBuildings[] = $isRequiredByBuildings;

        return $this;
    }

    /**
     * Remove isRequiredByBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuildings
     */
    public function removeIsRequiredByBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $isRequiredByBuildings)
    {
        $this->isRequiredByBuildings->removeElement($isRequiredByBuildings);
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
     * Add isRequiredByUnits
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigUnit $isRequiredByUnits
     * @return ConfigTechnologyLevel
     */
    public function addIsRequiredByUnit(\TS\Bundle\GameConfigBundle\Entity\ConfigUnit $isRequiredByUnits)
    {
        $this->isRequiredByUnits[] = $isRequiredByUnits;

        return $this;
    }

    /**
     * Remove isRequiredByUnits
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigUnit $isRequiredByUnits
     */
    public function removeIsRequiredByUnit(\TS\Bundle\GameConfigBundle\Entity\ConfigUnit $isRequiredByUnits)
    {
        $this->isRequiredByUnits->removeElement($isRequiredByUnits);
    }

    /**
     * Get isRequiredByUnits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIsRequiredByUnits()
    {
        return $this->isRequiredByUnits;
    }

    /**
     * Add requiredBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuildings
     * @return ConfigTechnologyLevel
     */
    public function addRequiredBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuildings)
    {
        $this->requiredBuildings[] = $requiredBuildings;
    
        return $this;
    }

    /**
     * Remove requiredBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuildings
     */
    public function removeRequiredBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $requiredBuildings)
    {
        $this->requiredBuildings->removeElement($requiredBuildings);
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
}