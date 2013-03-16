<?php

namespace TS\Bundle\SiegeCraftBundle\Service;

use Doctrine\ORM\EntityManager;

class PlayerInfo
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $userId
     * @return array
     */
    public function getTabs($userId)
    {
        return array(
            'Fortress',
            'Resources',
            'Observatory',
            'Buildings'
        );
    }

    public function getResources($userId)
    {
        $player = $this->em->getRepository('TSSiegeCraftBundle:Player')->findOneByUser($userId);

        return $player->getResources();
    }
}