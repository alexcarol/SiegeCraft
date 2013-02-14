<?php

namespace TS\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigTechnology
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ConfigTechnology
{
    use Costs;

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
     * @var float
     *
     * @ORM\Column(name="multiplier", type="float")
     */
    private $multiplier;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnology", mappedBy="requiredTechnologies")
     */
    private $isRequiredByTechnology;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnology", inversedBy="isRequiredByTechnologies")
     * @ORM\JoinTable(name="technology_technology_requirements",
     *      joinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="required_technology_id", referencedColumnName="id")}
     *      )
     */
    private $requiredTechnologies;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigBuilding", inversedBy="isRequiredByTechnologies")
     * @ORM\JoinTable(name="technology_building_requirements",
     *      joinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")}
     *      )
     */
    private $isRequiredByBuildings;

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
     * @return ConfigTechnology
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
     * @return ConfigTechnology
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
     * @return ConfigTechnology
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
        $this->isRequiredByTechnology = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requiredTechnologies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isRequiredByBuildings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isRequiredByUnits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add isRequiredByTechnology
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $isRequiredByTechnology
     * @return ConfigTechnology
     */
    public function addIsRequiredByTechnology(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $isRequiredByTechnology)
    {
        $this->isRequiredByTechnology[] = $isRequiredByTechnology;
    
        return $this;
    }

    /**
     * Remove isRequiredByTechnology
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $isRequiredByTechnology
     */
    public function removeIsRequiredByTechnology(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $isRequiredByTechnology)
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
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologies
     * @return ConfigTechnology
     */
    public function addRequiredTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologies)
    {
        $this->requiredTechnologies[] = $requiredTechnologies;
    
        return $this;
    }

    /**
     * Remove requiredTechnologies
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologies
     */
    public function removeRequiredTechnologie(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologies)
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
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuildings
     * @return ConfigTechnology
     */
    public function addIsRequiredByBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuildings)
    {
        $this->isRequiredByBuildings[] = $isRequiredByBuildings;
    
        return $this;
    }

    /**
     * Remove isRequiredByBuildings
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuildings
     */
    public function removeIsRequiredByBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuildings)
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
     * @return ConfigTechnology
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
}