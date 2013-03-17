<?php

namespace TS\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ConfigUnit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ConfigUnit
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
     * @ORM\Translatable;
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Translatable;
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseAttack", type="integer")
     */
    private $baseAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseDefense", type="integer")
     */
    private $baseDefense;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseHealth", type="integer")
     */
    private $baseHealth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="productionTime", type="time")
     */
    private $productionTime;



    /**
     * @ORM\ManyToOne(targetEntity="ConfigBuildingLevel", inversedBy="units")
     */
    private $building;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnologyLevel", mappedBy="isRequiredByUnits")
     * @ORM\JoinTable(name="unit_technology_requirements",
     *      joinColumns={@ORM\JoinColumn(name="unit_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")}
     *      )
     */
    private $requiredTechnologies;

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
     * @return ConfigUnit
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
     * @return ConfigUnit
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
     * Set baseAttack
     *
     * @param integer $baseAttack
     * @return ConfigUnit
     */
    public function setBaseAttack($baseAttack)
    {
        $this->baseAttack = $baseAttack;

        return $this;
    }

    /**
     * Get baseAttack
     *
     * @return integer
     */
    public function getBaseAttack()
    {
        return $this->baseAttack;
    }

    /**
     * Set baseDefense
     *
     * @param integer $baseDefense
     * @return ConfigUnit
     */
    public function setBaseDefense($baseDefense)
    {
        $this->baseDefense = $baseDefense;

        return $this;
    }

    /**
     * Get baseDefense
     *
     * @return integer
     */
    public function getBaseDefense()
    {
        return $this->baseDefense;
    }

    /**
     * Set baseHealth
     *
     * @param integer $baseHealth
     * @return ConfigUnit
     */
    public function setBaseHealth($baseHealth)
    {
        $this->baseHealth = $baseHealth;

        return $this;
    }

    /**
     * Get baseHealth
     *
     * @return integer
     */
    public function getBaseHealth()
    {
        return $this->baseHealth;
    }

    /**
     * Set productionTime
     *
     * @param \DateTime $productionTime
     * @return ConfigUnit
     */
    public function setProductionTime($productionTime)
    {
        $this->productionTime = $productionTime;

        return $this;
    }

    /**
     * Get productionTime
     *
     * @return \DateTime
     */
    public function getProductionTime()
    {
        return $this->productionTime;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->requiredTechnologies = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set building
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $building
     * @return ConfigUnit
     */
    public function setBuilding(\TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel $building = null)
    {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return \TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Add requiredTechnology
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnology
     * @return ConfigUnit
     */
    public function addRequiredTechnology(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnology)
    {
        $this->requiredTechnologies[] = $requiredTechnology;

        return $this;
    }

    /**
     * Remove requiredTechnology
     *
     * @param \TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnology
     */
    public function removeRequiredTechnology(\TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel $requiredTechnology)
    {
        $this->requiredTechnologies->removeElement($requiredTechnology);
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
}
