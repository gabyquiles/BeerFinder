<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 5/10/18
 * Time: 5:46 PM
 */

namespace App\Model;


use App\Entity\Address;
use App\Entity\Brewery;

class DistancedBrewery implements BreweryInterface
{
    private $id;

    /** @var Brewery */
    private $brewery;

    /**
     * @var float
     */
    private $distance;

    public function __construct(Brewery $brewery, $distance)
    {
        $this->brewery = $brewery;
        $this->distance = $distance;
    }

    public function getId(): int
    {
        return $this->brewery->getId();
    }

    public function getName(): ?string
    {
        return $this->brewery->getName();
    }

    public function getPhone(): ?string
    {
        return $this->brewery->getPhone();
    }

    public function getWebpage(): ?string
    {
        return $this->brewery->getWebpage();
    }

    public function getAddress(): ?Address
    {
        return $this->brewery->getAddress();
    }

    public function getCoordinates()
    {
        return $this->brewery->getCoordinates();
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }
}