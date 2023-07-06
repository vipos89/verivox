<?php

    namespace App\Interfaces\Services;

    interface TariffCompareServiceInterface
    {
        public function compare(array $tariffs, int $consumption);

    }