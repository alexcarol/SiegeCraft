<?php

namespace TS\Bundle\GameConfigBundle\Service;

use Doctrine\ORM\EntityManager;

class GameConfigLoaderService
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getBuildings()
    {
        return $this->em->getRepository('TSGameConfigBundle:ConfigBuilding')->findAll();
    }

    public function getUnits()
    {
        return $this->em->getRepository('TSGameConfigBundle:ConfigUnit')->findAll();
    }

    public function getTechnologies()
    {
        return $this->em->getRepository('TSGameConfigBundle:ConfigTechnology')->findAll();
    }

}
