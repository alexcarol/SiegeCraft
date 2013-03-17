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
            'Buildings',
            'Cyberlab',
            'Neo Training',
            'Technopub',
            'Boss Nests',
            'Commandment',
            'Neo Bazaar',
            'Prison',
            'Terra Chapel'
        );
    }

    public function getResources($userId)
    {
        $player = $this->em->getRepository('TSSiegeCraftBundle:Player')->findOneByUser($userId);

        return $player->getResources();
    }
    
    public function getNodes($userId)
    {
        $player = $this->em->getRepository('TSSiegeCraftBundle:Player')->findOneByUser($userId);
        $fortress = $player->getFortress();

        return $fortress->getNodes();
    }
}