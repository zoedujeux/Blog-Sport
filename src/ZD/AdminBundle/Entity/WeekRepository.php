<?php

namespace ZD\AdminBundle\Entity;

/**
 * WeekRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WeekRepository extends \Doctrine\ORM\EntityRepository
{
    public function myFindAll()
    {

      $queryBuilder = $this->createQueryBuilder('d');

      // On récupère la Query à partir du QueryBuilder
      $query = $queryBuilder->getQuery();

      // On récupère les résultats à partir de la Query
      $results = $query->getResult();

      // On retourne ces résultats
      return $results;
    }
}
