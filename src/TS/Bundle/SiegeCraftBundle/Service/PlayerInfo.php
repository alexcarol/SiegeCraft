<?php

namespace TS\Bundle\SiegeCraftBundle\Service;

use TS\Bundle\SiegeCraftBundle\Entity\Node;
use Doctrine\ORM\EntityManager;

class PlayerInfo
{
    /**
     * @var EntityManager
     */
    private $em;

    private $tabs;

    public function __construct(EntityManager $em, $tabs)
    {
        $this->em = $em;
        $this->tabs = $tabs;
    }

    /**
     * @todo building logic to find which extra tabs should be activated
     * @param $userId
     * @return array
     */
    public function getTabs($userId)
    {
        $tabs = [];

        foreach ($this->tabs as $tabName => $active) {
            $tabs[] = [
                'id' => $tabName,
                'title' => $this->getDisplayName($tabName),
                'active' => $active
            ];
        }

        return $tabs;
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

    /**
     * Gets the displayable name of an identifier, e.g.
     *  'boss_nests' => 'Boss Nests'
     *
     * @param string $name
     * @return string
     */
    private function getDisplayName($name)
    {
        return ucwords(strtr($name, '_', ' '));
    }
}