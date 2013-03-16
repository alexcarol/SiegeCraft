<?php

namespace TS\Bundle\SiegeCraftBundle\Repository;

use Doctrine\ORM\EntityRepository;

class Region extends EntityRepository {
    /**
     * Warning, this query is not saved in
     * @param $fortressId
     */
    public function assignRegion($fortressId) {
        //$em = $this->getEntityManager();
        //$this->createQueryBuilder()->select()

        $sql = 'UPDATE Region r1 ' .
               'SET r1.fortress_id = :fortress ' .
               'WHERE r1.id = (' .
                    'SELECT reg.id ' .
                    'FROM (SELECT r.id, r.zone_id ' .
                          'FROM Region r ' .
                          'WHERE r.fortress_id IS NULL ' .
                          'ORDER BY RAND() ' .
                          'LIMIT 1) reg '.
                    'WHERE reg.id = r1.id AND reg.zone_id = r1.zone_id ' .
                ')';
        $params = array(
            'fortress' => $fortressId
        );
        $q = $this->getEntityManager()->getConnection()->executeUpdate($sql, $params);
    }
}
