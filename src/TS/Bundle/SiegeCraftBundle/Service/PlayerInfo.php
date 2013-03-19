<?php

namespace TS\Bundle\SiegeCraftBundle\Service;

use TS\Bundle\SiegeCraftBundle\Entity\Node;
use Doctrine\ORM\EntityManager;

class PlayerInfo
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @todo get actual user tabs
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

    /**
     * @param int $userId
     * @return mixed
     */
    public function getResources($userId)
    {
        $player = $this->em->getRepository('TSSiegeCraftBundle:Player')->findOneByUser($userId);

        return $player->getResources();
    }

    /**
     * @param int $userId
     * @return array of Node
     */
    public function getNodes($userId)
    {
        $player = $this->em->getRepository('TSSiegeCraftBundle:Player')->findOneByUser($userId);
        $fortress = $player->getFortress();

        return $fortress->getNodes();
    }

    /**
     * @param int $userId
     * @param int $nodeId
     * @throws \InvalidArgumentException
     * @return Node
     */
    public function getNode($userId, $nodeId)
    {
        $nodes = $this->getNodes($userId);

        foreach ($nodes as $node) {
            if ($node->id == $nodeId) {
                return $node;
            }
        }

        throw new \InvalidArgumentException('Node with id ' . $nodeId . ' doesn\'t exist.');
    }

    /**
     * @param int $userId
     */
    public function getBuildings($userId)
    {
        $player = $this->em->getRepository('TSSiegeCraftBundle:Player')->findOneByUser($userId);
        $fortress = $player->getFortress();

        return $fortress->getBuildings();
    }
}