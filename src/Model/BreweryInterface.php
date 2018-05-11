<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 5/10/18
 * Time: 5:46 PM
 */

namespace App\Model;


use App\Entity\Address;

interface BreweryInterface
{
    public function getId(): int;

    public function getName(): ?string;

    public function getPhone(): ?string;

    public function getWebpage(): ?string;

    public function getAddress(): ?Address;

    public function getCoordinates();

    public function getDistance(): ?float;
}