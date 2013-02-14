<?php

namespace TS\Bundle\GameConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

trait Costs {
    /**
     * @ORM\Column(name="costs", type="json_array")
     */
    private $costs = array(
        'g' => 0,
        'e' => 0,
    );

    /**
     * Set costs
     *
     * @param array $costs
     * @return ConfigUnit
     */
    public function setCosts($costs)
    {
        $this->costs = $costs;

        return $this;
    }

    /**
     * Get costs
     *
     * @return array
     */
    public function getCosts()
    {
        return $this->costs;
    }

    /**
     * @return int
     */
    public function getGoldCost()
    {
        return $this->costs['g'];
    }

    /**
     * @param int $cost
     */
    public function setGoldCost($cost)
    {
        $this->costs['g'] = $cost;
    }

    /**
     * @return int
     */
    public function getEnergyCost()
    {
        return $this->costs['e'];
    }

    /**
     * @param int $cost
     */
    public function setEnergyCost($cost)
    {
        $this->costs['e'] = $cost;
    }
}
