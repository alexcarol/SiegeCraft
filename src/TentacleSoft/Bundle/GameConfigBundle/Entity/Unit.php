<?php

namespace TentacleSoft\Bundle\GameConfigBundle\Entity;

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
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
