<?php

namespace TS\Bundle\SiegeCraftBundle\Entity\Traits;


trait Resources {
    /**
     * @ORM\Column(name="resources", type="json_array")
     */
    private $resources = array(
        'g' => 0,
        'e' => 0,
    );

    /**
     * Set resources
     *
     * @param array $resources
     * @return ConfigUnit
     */
    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Get resources
     *
     * @return array
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @return int
     */
    public function getGoldResource()
    {
        return $this->resources['g'];
    }

    /**
     * @param int $resource
     */
    public function setGoldResource($resource)
    {
        $this->resources['g'] = $resource;
    }

    /**
     * @return int
     */
    public function getEnergyResource()
    {
        return $this->resources['e'];
    }

    /**
     * @param int $resource
     */
    public function setEnergyResource($resource)
    {
        $this->resources['e'] = $resource;
    }

}