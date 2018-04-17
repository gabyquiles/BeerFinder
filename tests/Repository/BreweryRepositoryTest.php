<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/16/18
 * Time: 9:07 PM
 */

namespace App\Tests\Repository;


use App\Doctrine\Type\Point;
use App\Repository\BreweryRepository;

class BreweryRepositoryTest extends BaseRepositoryTest
{
    /** @var BreweryRepository */
    private $breweryRepository;

    public function setUp()
    {
        parent::setUp();
        $this->breweryRepository = $this->getRepository('App:Brewery');
    }

    public function testGetBreweriesWithinRadius()
    {
        $center = new Point(27.770884, -82.663962);
        $radius = 5;

        $breweries = $this->breweryRepository->getBreweriesWithinRadius($center, $radius);
        $this->assertCount(2, $breweries);
        $this->assertEquals("Right Around the Corner", $breweries[0]->getName());
        $this->assertEquals("Flying Boat Brewing Company", $breweries[1]->getName());
    }
}