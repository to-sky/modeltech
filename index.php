<?php

declare(strict_types=1);

const BASE_PATH = __DIR__.'/';
const CSV_FILE_PATH = BASE_PATH . 'data/cars.csv';

require BASE_PATH . 'Core/BaseCar.php';
require BASE_PATH . 'Core/Car.php';
require BASE_PATH . 'Core/Truck.php';
require BASE_PATH . 'Core/SpecMachine.php';
require BASE_PATH . 'Services/CsvParser.php';

/**
 * Get list of cars from CSV file
 *
 * @param $fileName
 * @return array
 * @throws Exception
 */
function getCarList($fileName): array
{
    $parser = new CsvParser($fileName);
    $items = $parser->process()->getItems();

    $carList = [];
    foreach ($items as $item) {
        $carList[] = match($item['car_type']) {
            'car' => new Car(
                $item['car_type'],
                $item['photo_file_name'],
                $item['brand'],
                $item['carrying'],
                $item['passenger_seats_count']
            ),
            'truck' => new Truck(
                $item['car_type'],
                $item['photo_file_name'],
                $item['brand'],
                $item['carrying'],
                $item['body_whl']['width'],
                $item['body_whl']['height'],
                $item['body_whl']['length']
            ),
            'spec_machine' => new SpecMachine(
                $item['car_type'],
                $item['photo_file_name'],
                $item['brand'],
                $item['carrying'],
                $item['extra']
            ),
            default => 'Undefined car type'
        };
    }

    return $carList;
}

// Main function
$carsList = getCarList(CSV_FILE_PATH);