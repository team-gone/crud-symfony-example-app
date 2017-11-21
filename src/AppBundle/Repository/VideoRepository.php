<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class VideoRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT v FROM AppBundle:Video v ORDER BY v.title ASC'
            )
            ->getResult();
    }

    public function findAvailable()
    {
    	return $this->getEntityManager()
            ->createQuery(
                'SELECT v FROM AppBundle:Video v WHERE v.release_date < CURRENT_TIMESTAMP() ORDER BY v.title ASC'
            )
            ->getResult();
    }

    public function findComingSoon()
    {
    	return $this->getEntityManager()
            ->createQuery(
                'SELECT v FROM AppBundle:Video v WHERE v.release_date > CURRENT_TIMESTAMP() ORDER BY v.title ASC'
            )
            ->getResult();
    }
}
