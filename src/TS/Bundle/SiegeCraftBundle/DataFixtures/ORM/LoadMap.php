<?php

namespace TS\Bundle\SiegeCraftBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TS\Bundle\SiegeCraftBundle\Entity\Region;
use TS\Bundle\SiegeCraftBundle\Entity\Zone;

class LoadMap implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $zone = new Zone();

        $manager->persist($zone);

        $manager->flush();

        for ($i = 0; $i < 9; ++$i) {
            $region = (new Region())->setId($i)->setZone($zone);
            $zone->addRegion($region);
        }


        $manager->flush();
    }
}