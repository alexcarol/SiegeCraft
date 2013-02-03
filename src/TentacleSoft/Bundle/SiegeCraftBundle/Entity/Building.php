<?php

namespace TentacleSoft\Bundle\SiegeCraftBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Building
 *
 * @ORM\Table()
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
     * @var integer
     *
     * @ORM\Column(name="configId", type="integer")
     */
    private $configId;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="smallint")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="Fortress")
     */
    private $fortress;

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
     * Set configId
     *
     * @param integer $configId
     * @return Building
     */
    public function setConfigId($configId)
    {
        $this->configId = $configId;

        return $this;
    }

    /**
     * Get configId
     *
     * @return integer
     */
    public function getConfigId()
    {
        return $this->configId;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Building
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
     * Set fortress
     *
     * @param Fortress $fortress
     * @return Building
     */
    public function setFortress(Fortress $fortress = null)
    {
        $this->fortress = $fortress;
    
        return $this;
    }

    /**
     * Get fortress
     *
     * @return Fortress
     */
    public function getFortress()
    {
        return $this->fortress;
    }
}