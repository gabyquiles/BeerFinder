<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/5/18
 * Time: 2:12 PM
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class Address
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $streetAddress1;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $streetAddress2;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $state;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $postalCode;

    /**
     * @return string
     */
    public function getStreetAddress1(): ?string
    {
        return $this->streetAddress1;
    }

    /**
     * @param string $streetAddress1
     */
    public function setStreetAddress1(string $streetAddress1): void
    {
        $this->streetAddress1 = $streetAddress1;
    }

    /**
     * @return string
     */
    public function getStreetAddress2(): ?string
    {
        return $this->streetAddress2;
    }

    /**
     * @param string $streetAddress2
     */
    public function setStreetAddress2(string $streetAddress2): void
    {
        $this->streetAddress2 = $streetAddress2;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

}