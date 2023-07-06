<?php

    namespace App\Services;

    use App\Interfaces\Services\TariffProviderInterface;

    class TariffProviderService implements TariffProviderInterface
    {

        public function getTariffs(): array
        {
            return [
                ["name"=> "Product A", "type"=> 1, "baseCost"=> 5, "additionalKwhCost"=> 22],
                ["name"=> "Product B", "type"=> 2, "includedKwh"=> 4000, "baseCost"=> 800,"additionalKwhCost"=> 30],
            ];
        }
    }