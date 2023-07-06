<?php

    namespace App\Interfaces\Services;

    interface TariffProviderInterface
    {
        public function getTariffs(): array;

    }