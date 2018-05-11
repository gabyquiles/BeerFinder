<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/7/18
 * Time: 10:38 AM
 */

namespace App\Repository;


use App\Doctrine\Type\Point;
use Doctrine\ORM\EntityRepository;

/**
 * Class BreweryRepository
 * All distance in and out should be in MILES
 * @package App\Repository
 */
class BreweryRepository extends EntityRepository
{
    public function demo()
    {
        $qb = $this->createQueryBuilder('brewery');
//        $qb->where('brewery.coordinates = POINT(:lat, :lon)');
        $qb->addSelect('DISTANCE(brewery.coordinates, POINT_STR(:point))');
//        $point = new Point(10, 20.5);
        $point = new Point(27.7676, 82.6403);
        $qb->setParameter(':point', $point->__toString());
//        $qb->setParameter(':lat', 27.7676);
//        $qb->setParameter(':lon', 82.6403);
        return $qb->getQuery()->getResult();
    }

    /**
     * @param Point $center Current location
     * @param int $radius Search radius in miles
     * @return mixed
     */
    public function getBreweriesWithinRadius(Point $center, $radius = 5)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('brewery, DISTANCE(brewery.coordinates, POINT_STR(:center)) * 69 AS distance');
        $qb->from('App:Brewery', 'brewery');
        $qb->where('DISTANCE(brewery.coordinates, POINT_STR(:center)) <= :radius');
        $qb->orderBy('distance');
        $qb->setParameter(':center', $center->__toString());
        $radiusInDegrees = $radius / 69;
        $qb->setParameter(':radius', $radiusInDegrees);
        return $qb->getQuery()->getResult();
    }
}