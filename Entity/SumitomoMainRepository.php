<?php

namespace CIR\Bundle\Entity;

use Doctrine\ORM\EntityRepository;
use CIR\Bundle\Controller;

/**
 * SumitomoMainRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SumitomoMainRepository extends EntityRepository
{

    public function searchSub($dano = "") {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT
                  s.id as subid, m.dano, m.partno, m.batchno,
                  s.heatcode, s.diecode, s.inqty
                FROM
                  CIRBundle:SumitomoMain m
                JOIN
                  m.sub s
            ');

        try {
            return $query->getArrayResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }
}
