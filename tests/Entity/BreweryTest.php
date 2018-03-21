<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/19/18
 * Time: 10:19 PM
 */

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class BreweryTest extends TestCase
{
    public function testBasicStructure()
    {
        $brewery = new Brewery();
        $this->assertNull($brewery->getName());
        $this->assertNull($brewery->getPhone());
        $this->assertNull($brewery->getWebpage());
        $address = $brewery->getAddress();
        $this->assertNull($address->getStreetAddress1());
        $this->assertNull($address->getStreetAddress2());
        $this->assertNull($address->getCity());
        $this->assertNull($address->getState());
        $this->assertNull($address->getPostalCode());
    }
}