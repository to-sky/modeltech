<?php

declare(strict_types=1);

class SpecMachine extends BaseCar
{
    public function __construct($carType, $photoFileName, $brand, $carrying, protected string $extra)
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);
    }

    /**
     * @return string
     */
    public function getExtra(): string
    {
        return $this->extra;
    }

    /**
     * @param string $extra
     */
    public function setExtra(string $extra): void
    {
        $this->extra = $extra;
    }
}