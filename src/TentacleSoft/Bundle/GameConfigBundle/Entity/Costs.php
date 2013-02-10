<?php

namespace TentacleSoft\Bundle\GameConfigBundle\Entity;

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


    public function getGoldCost()
    {
        return $this->costs['g'];
    }

    public function setGoldCost($cost)
    {
        $this->costs['g'] = $cost;
    }

    public function getEnergyCost()
    {
        return $this->costs['e'];
    }

    public function setEnergyCost($cost)
    {
        $this->costs['e'] = $cost;
    }
}
