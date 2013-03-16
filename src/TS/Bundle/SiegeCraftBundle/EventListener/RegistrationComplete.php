<?php

namespace TS\Bundle\SiegeCraftBundle\EventListener;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use TS\Bundle\SiegeCraftBundle\Entity\Fortress;
use TS\Bundle\SiegeCraftBundle\Entity\Node;
use TS\Bundle\SiegeCraftBundle\Entity\Player;
use TS\Bundle\SiegeCraftBundle\Entity\Region;

class RegistrationComplete implements EventSubscriberInterface {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    private $nodesInfo = array(
        array(0,0),
        array(0,1),
        array(1,0),
        array(0,-1),
        array(-1,0),
    );


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => 'onRegistrationComplete',
        );
    }

    public function onRegistrationComplete(FilterUserResponseEvent $event)
    {
        $player = new Player();

        $fortress = new Fortress();
        $fortress
            ->setName('Fortress');

        foreach ($this->nodesInfo as $info) {
            $node = new Node();
            $node
                ->setFortress($fortress)
                ->setPosX($info[0])
                ->setPosY($info[1]);
            $this->em->persist($node);
        }

        $player
            ->setUser($event->getUser())
            ->setFortress($fortress);
        $this->em->persist($fortress);

        $this->em->persist($player);

        $this->em->flush();

        $this->em->getRepository('TSSiegeCraftBundle:Region')->assignRegion($fortress->getId());
    }
}