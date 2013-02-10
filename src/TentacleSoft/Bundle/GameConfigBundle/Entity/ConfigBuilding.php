<?php

namespace TentacleSoft\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Building
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ConfigBuilding
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
     * @ORM\ManyToMany(targetEntity="ConfigBuilding", mappedBy="requiredBuildings")
     */
    private $isRequiredByBuildings;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigBuilding", inversedBy="isRequiredByBuildings")
     * @ORM\JoinTable(name="building_building_requirements",
     *      joinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="required_building_id", referencedColumnName="id")}
     *      )
     */
    private $requiredBuildings;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnology", mappedBy="isRequiredByBuildings")
     * @ORM\JoinTable(name="building_technology_requirements",
     *      joinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")}
     *      )
     */
    private $requiredTechnologies;

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
        $this->isRequiredByBuildings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requiredBuildings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requiredTechnologies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->units = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add isRequiredByBuildings
     *
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuilding
     * @return ConfigBuilding
     */
    public function addIsRequiredByBuilding(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuilding)
    {
        $this->isRequiredByBuildings[] = $isRequiredByBuilding;

        return $this;
    }

    /**
     * Remove isRequiredByBuildings
     *
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuilding
     */
    public function removeIsRequiredByBuilding(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $isRequiredByBuilding)
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
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $requiredBuilding
     * @return ConfigBuilding
     */
    public function addRequiredBuilding(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $requiredBuilding)
    {
        $this->requiredBuildings[] = $requiredBuilding;

        return $this;
    }

    /**
     * Remove requiredBuildings
     *
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $requiredBuilding
     */
    public function removeRequiredBuilding(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigBuilding $requiredBuilding)
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
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologie
     * @return ConfigBuilding
     */
    public function addRequiredTechnologie(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologie)
    {
        $this->requiredTechnologies[] = $requiredTechnologie;

        return $this;
    }

    /**
     * Remove requiredTechnologies
     *
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologie
     */
    public function removeRequiredTechnologie(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigTechnology $requiredTechnologie)
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
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigUnit $unit
     * @return ConfigBuilding
     */
    public function addUnit(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigUnit $unit)
    {
        $this->units[] = $unit;

        return $this;
    }

    /**
     * Remove units
     *
     * @param \TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigUnit $unit
     */
    public function removeUnit(\TentacleSoft\Bundle\GameConfigBundle\Entity\ConfigUnit $unit)
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
}
