<?php

namespace TS\Bundle\SiegeCraftBundle\Entity\Traits;


trait Resources {
    /**
     * @ORM\Column(name="resources", type="json_array")
     */
    private $resources = array(
        'p' => 0,
        'q' => 0,
        'a' => 0,
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
    public function getPlatinumResource()
    {
        return $this->resources['p'];
    }

    /**
     * @param int $resource
     */
    public function setPlatinumResource($resource)
    {
        $this->resources['p'] = $resource;
    }

    /**
     * @return int
     */
    public function getQuartzResource()
    {
        return $this->resources['q'];
    }

    /**
     * @param int $resource
     */
    public function setQuartzResource($resource)
    {
        $this->resources['q'] = $resource;
    }

    /**
     * @return int
     */
    public function getAntimatterResource()
    {
        return $this->resources['a'];
    }

    /**
     * @param int $resource
     */
    public function setAntimatterResource($resource)
    {
        $this->resources['a'] = $resource;
    }
}