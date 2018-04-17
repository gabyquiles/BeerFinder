<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/13/18
 * Time: 11:09 PM
 */

namespace App\Tests\Doctrine\Type;


use App\Doctrine\Type\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testToString()
    {
        $point = new Point();
        $point->setLatitude(12.34);
        $point->setLongitude(98.76);
        $this->assertEquals(12.34, $point->getLatitude());
        $this->assertEquals(98.76, $point->getLongitude());
        $this->assertEquals("POINT(12.340000, 98.760000)", $point->__toString());
    }
}