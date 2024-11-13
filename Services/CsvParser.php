<?php

declare(strict_types=1);

class CsvParser
{
    /**
     * All items from CSV file
     * @var array
     */
    protected array $items = [];

    /**
     * File pointer
     * @var false|resource
     */
    private $fp;

    /**
     * Headers from CSV file
     * @var array
     */
    private array $headers = [];

    /**
     * CsvParser constructor.
     * @param string $fileName
     * @param string $separator
     * @param int $length
     * @throws Exception
     */
    function __construct(string $fileName, private string $separator = ";", private int $length = 1000)
    {
        if (!file_exists($fileName)) {
            throw new Exception("File '$fileName' doesn't exists");
        }

        $this->fp = fopen($fileName, 'r');
    }

    /**
     * Main handler
     * @return $this
     * @throws Exception
     */
    public function process(): static
    {
        if ($this->fp === false) {
            throw new Exception("Can't open file");
        }

        while (($row = fgetcsv($this->fp, $this->length, $this->separator)) !== false) {
            if (!$this->headers) {
                $this->headers = $row;
                continue;
            }

            if (count($row) < count($this->headers) || empty(array_filter($row))){
                continue;
            }

            $this->items[] = $this->prepareItemData($row);

        }

        fclose($this->fp);

        return $this;
    }

    /**
     * Prepare data for the row
     * @param $row
     * @return array
     */
    private function prepareItemData($row): array
    {
        $item = [];

        foreach (array_combine($this->headers, $row) as $header => $rowItem) {
            $item[$header] = match ($header) {
                'body_whl' => $this->parseWhl($rowItem),
                'carrying' => floatval($rowItem),
                'passenger_seats_count' => intval($rowItem),
                default => $rowItem
            };
        }

        return $item;
    }

    /**
     * Makes data about the width, height and length of a truck
     * @param $data
     * @return array
     */
    private function parseWhl($data): array
    {
        $whl = [
            'width' => 0.0,
            'height' => 0.0,
            'length' => 0.0,
        ];

        if (empty($data)) {
            return $whl;
        }

        return array_combine(array_keys($whl), array_map('floatval', explode('x', $data)));
    }

    /**
     * Get all parsed items
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
