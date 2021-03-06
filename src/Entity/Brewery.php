<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/19/18
 * Time: 10:35 PM
 */

namespace App\Entity;

use App\Doctrine\Type\Point;
use App\Model\BreweryInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BreweryRepository")
 */
class Brewery implements BreweryInterface
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=14, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $webpage;

    /**
     * @var Address
     *
     * @ORM\Embedded(class="App\Entity\Address")
     */
    private $address;

    /**
     * @ORM\Column(type="point")
     */
    private $coordinates;

    /**
     * @var float
     */
    private $distance;

    /**
     * Brewery constructor.
     */
    public function __construct()
    {
        $this->address = new Address();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getWebpage(): ?string
    {
        return $this->webpage;
    }

    /**
     * @param string $webpage
     */
    public function setWebpage(string $webpage): void
    {
        $this->webpage = $webpage;
    }

    /**
     * @return Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return Point
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param Point $coordinates
     */
    public function setCoordinates(Point $coordinates): void
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return float
     */
    public function getDistance(): ?float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    public function __toString()
    {
        return $this->getName() ? $this->getName() : "New Brewery";
    }
}