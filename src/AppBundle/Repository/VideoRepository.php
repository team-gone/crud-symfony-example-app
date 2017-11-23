<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class VideoRepository extends EntityRepository
{
    /**
     * Find all videos orderer by title
     *
     * @return EntityManagerInterface
     */
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT v FROM AppBundle:Video v ORDER BY v.title ASC'
            )
            ->getResult();
    }

    /**
     * Find available videos orderer by title
     *
     * @return EntityManagerInterface
     */
    public function findAvailable()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT v FROM AppBundle:Video v WHERE v.releaseDate < CURRENT_TIMESTAMP() ORDER BY v.title ASC'
            )
            ->getResult();
    }

    /**
     * Find coming soon videos orderer by title
     *
     * @return EntityManagerInterface
     */
    public function findComingSoon()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT v FROM AppBundle:Video v WHERE v.releaseDate > CURRENT_TIMESTAMP() ORDER BY v.title ASC'
            )
            ->getResult();
    }
}
