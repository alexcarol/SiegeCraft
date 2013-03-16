<?php

namespace TS\Bundle\SiegeCraftBundle\Repository;

use Doctrine\ORM\EntityRepository;

class Region extends EntityRepository {
    /**
     * Warning, this query is not saved in
     * @param $fortressId
     */
    public function assignRegion($fortressId) {
        $sql = 'UPDATE Region ' .
               'SET fortress_id = :fortress ' .
               'WHERE id = (' .
                    'SELECT reg.id ' .
                    'FROM (SELECT r.id ' .
                          'FROM Region r ' .
                          'WHERE r.fortress_id IS NULL ' .
                          'ORDER BY RAND() ' .
                          'LIMIT 1) reg )';
        $params = array(
            'fortress' => $fortressId
        );
        $q = $this->getEntityManager()->getConnection()->executeUpdate($sql, $params);
    }
}
