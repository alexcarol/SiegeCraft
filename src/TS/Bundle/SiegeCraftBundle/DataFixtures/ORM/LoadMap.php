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
        $zones = array();

        for ($j = 0; $j < 500; ++$j) {
            $zone = new Zone();
            $manager->persist($zone);
            $zones[] = $zone;
        }

        $manager->flush();

        foreach ($zones as $zone) {
            for ($i = 0; $i < 9; ++$i) {
                $region = (new Region())->setId($i)->setZone($zone);
                $zone->addRegion($region);
                $manager->persist($region);
            }
        }

        $manager->flush();
    }
}