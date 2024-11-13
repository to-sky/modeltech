<?php

declare(strict_types=1);

abstract class BaseCar
{
    public function __construct(
        protected string $carType,
        protected string $photoFileName,
        protected string $brand,
        protected float $carrying
    )
    {
    }

    /**
     * @return string
     */
    public function getCarType(): string
    {
        return $this->carType;
    }

    /**
     * @param string $carType
     */
    public function setCarType(string $carType): void
    {
        $this->carType = $carType;
    }

    /**
     * @return string
     */
    public function getPhotoFileName(): string
    {
        return $this->photoFileName;
    }

    /**
     * @param string $photoFileName
     */
    public function setPhotoFileName(string $photoFileName): void
    {
        $this->photoFileName = $photoFileName;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return float
     */
    public function getCarrying(): float
    {
        return $this->carrying;
    }

    /**
     * @param float $carrying
     */
    public function setCarrying(float $carrying): void
    {
        $this->carrying = $carrying;
    }

    /**
     * @return string
     */
    public function getPhotoFileExt(): string
    {
        $extension = pathinfo($this->photoFileName, PATHINFO_EXTENSION);

        return $extension ? ".$extension" : "";
    }
}
