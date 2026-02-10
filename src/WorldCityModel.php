<?php

class WorldCityModel {
    function __construct(
        public int $id,
        public string $city,
        public string $cityAscii,
        public float $lat,
        public float $lng,
        public string $country,
        public string $iso2,
        public string $iso3,
        public string $adminName,
        public string $capital,
        public int $population
    )
    {}

    public function cityWithCountry(): string{
        return "{$this->city} ({$this->country})";
    }

    public function getFlag(): string{
        return get_flag($this->iso2);
    }
}
