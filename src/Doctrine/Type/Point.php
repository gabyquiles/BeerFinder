<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/13/18
 * Time: 11:09 PM
 */

namespace App\Doctrine\Type;

/**
 * Point object for spatial mapping
 */
class Point
{
    /**
     * @var float
     */
    private $latitude;
    /**
     * @var float
     */
    private $longitude;

    /**
     * Point constructor.
     * @param $latitude
     * @param $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function __toString()
    {
        return sprintf("POINT(%f %f)", $this->latitude, $this->longitude);
    }
}