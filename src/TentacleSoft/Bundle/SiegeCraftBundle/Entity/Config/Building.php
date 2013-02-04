<?php

namespace TentacleSoft\Bundle\SiegeCraftBundle\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * Building
 *
 * @ORM\Table("building_config")
 * @ORM\Entity
 */
class Building
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
     * @var float
     *
     * @ORM\Column(name="multiplier", type="float")
     */
    private $multiplier;

    /**
     * @ORM\ManyToMany(targetEntity="Building", mappedBy="requiredBuildings")
     */
    private $isRequiredByBuildings;

    /**
     * @ORM\ManyToMany(targetEntity="Building", inversedBy="isRequiredByBuildings")
     * @ORM\JoinTable(name="requirements",
     *      joinColumns={@ORM\JoinColumn(name="building_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="required_building_id", referencedColumnName="id")}
     *      )
     */
    private $requiredBuildings;

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
     * @return Building
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
     * @return Building
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
     * @return Building
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
}
