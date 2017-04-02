<?php

namespace app\entities\Employee;

use Assert\Assertion;

class Address
{
    private $country;
    private $region;
    private $city;
    private $street;
    private $house;

    public function __construct($country, $region, $city, $street, $house)
    {
        Assertion::notEmpty($country);
        Assertion::notEmpty($city);

        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
    }

    public function getCountry() { return $this->country; }
    public function getRegion() { return $this->region; }
    public function getCity() { return $this->city; }
    public function getStreet() { return $this->street; }
    public function getHouse() { return $this->house; }
}
