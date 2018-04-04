<?php


namespace AppBundle\Repository;

use AppBundle\Entity\Year;
use Doctrine\ORM\EntityRepository;

class YearRepository extends EntityRepository
{
    /**
     * @return Year[]
     */
    public function findAllGroupedByMonth()
    {
        return $this->createQueryBuilder('year')
            ->groupBy('year.month')
            ->getQuery()
            ->execute();
    }
}