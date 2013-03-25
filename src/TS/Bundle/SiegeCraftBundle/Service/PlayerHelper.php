<?php

namespace TS\Bundle\SiegeCraftBundle\Service;

use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use TS\Bundle\SiegeCraftBundle\Entity\Player;
use TS\Bundle\SiegeCraftBundle\Entity\Node;

class PlayerHelper
{
    private $tabs;

    /**
     * @var \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    private $translator;

    public function __construct(array $tabs, Translator $translator)
    {
        $this->tabs = $tabs;
        $this->translator = $translator;
    }

    /**
     * @param Player $player
     * @return array
     */
    public function getTabs(Player $player)
    {
        $tabs = [];

        foreach ($this->tabs as $tabName => $active) {
            $tabs[] = [
                'id' => $tabName,
                'title' => $this->translator->trans('tabs.' . $tabName, array(), 'TSSiegeCraftBundle'),
                'active' => $active
            ];
        }

        return $tabs;
    }

    /**
     * @param Player $player
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNodes(Player $player)
    {
        return $player->getFortress()->getNodes();
    }

    /**
     * @param Player $player
     * @param $nodeId
     * @return Node
     * @throws \InvalidArgumentException
     */
    public function getNode(Player $player, $nodeId)
    {
        $nodes = $this->getNodes($player);

        foreach ($nodes as $node) {
            if ($node->id === $nodeId) {
                return $node;
            }
        }

        throw new \InvalidArgumentException(sprintf('Node with id %s doesn\'t exist.', $nodeId));
    }

    /**
     * @param Player $player
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBuildings(Player $player)
    {
        return $player->getFortress()->getBuildings();
    }
}