<?php

declare(strict_types=1);

class Truck extends BaseCar
{
    public function __construct(
        $carType, $photoFileName, $brand, $carrying,
        protected float $bodyWidth = 0.0, protected float $bodyHeight = 0.0, protected float $bodyLength = 0.0
    )
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);
    }

    /**
     * @return float
     */
    public function getBodyWidth(): float
    {
        return $this->bodyWidth;
    }

    /**
     * @param float $bodyWidth
     */
    public function setBodyWidth(float $bodyWidth): void
    {
        $this->bodyWidth = $bodyWidth;
    }

    /**
     * @return float
     */
    public function getBodyHeight(): float
    {
        return $this->bodyHeight;
    }

    /**
     * @param float $bodyHeight
     */
    public function setBodyHeight(float $bodyHeight): void
    {
        $this->bodyHeight = $bodyHeight;
    }

    /**
     * @return float
     */
    public function getBodyLength(): float
    {
        return $this->bodyLength;
    }

    /**
     * @param float $bodyLength
     */
    public function setBodyLength(float $bodyLength): void
    {
        $this->bodyLength = $bodyLength;
    }

    public function getBodyVolume(): float
    {
        return $this->bodyWidth * $this->bodyHeight * $this->bodyLength;
    }
}
