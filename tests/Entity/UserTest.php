<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/26/18
 * Time: 10:30 PM
 */

namespace App\Tests\Entity;


use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testBasicStructure()
    {
        $user = new User();
        $this->assertNull($user->getFirstName());
        $this->assertNull($user->getLastName());
        $this->assertNull($user->getEmail());
        $this->assertNull($user->getPassword());
    }

    public function testSetEmail()
    {
        $user = new User();
        $user->setEmail('testuser@example.com');
        $this->assertEquals('testuser@example.com', $user->getUsername());
    }

}