<?php

declare(strict_types=1);

class Car extends BaseCar
{
    public function __construct($carType, $photoFileName, $brand, $carrying, protected int $passengerSeatsCount)
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);
    }

    /**
     * @return int
     */
    public function getPassengerSeatsCount(): int
    {
        return $this->passengerSeatsCount;
    }

    /**
     * @param int $passengerSeatsCount
     */
    public function setPassengerSeatsCount(int $passengerSeatsCount): void
    {
        $this->passengerSeatsCount = $passengerSeatsCount;
    }

}