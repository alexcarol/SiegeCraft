<?php

namespace TentacleSoft\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigUnit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ConfigUnit
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
     * @ORM\Column(name="costs", type="array")
     */
    private $costs;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBuilding", inversedBy="units")
     */
    private $building;

    /**
     * @ORM\ManyToMany(targetEntity="ConfigTechnology", mappedBy="isRequiredByUnits")
     * @ORM\JoinTable(name="unit_technology_requirements",
     *      joinColumns={@ORM\JoinColumn(name="unit_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="technology_id", referencedColumnName="id")}
     *      )
     */
    private $requiredTechnologies;

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
}
