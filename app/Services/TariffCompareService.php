<?php

    namespace App\Services;

    use App\Interfaces\Services\TariffCompareServiceInterface;

    class TariffCompareService implements TariffCompareServiceInterface
    {


        public function compare(array $tariffs, int $consumption)
        {
            $tariffs = collect($tariffs);
            return $tariffs->map(function ($element) use ($consumption){
                return [
                    'name' => $element['name'] ,
                    'cost' => $this->calculateModel($element, $consumption)
                ];
            })->sortByDesc('cost');
        }
        private function calculateModel(array $tariff, int $consumption){
            $sum = 0;
            if (!empty($tariff['baseCost'])){
                $sum +=  $tariff['baseCost'] * 12;
            }
            if (!empty($tariff['includedKwh'])){
                $consumption -= $tariff['includedKwh'];
                $consumption = max($consumption, 0);
            }
            $sum += ($consumption * $tariff["additionalKwhCost"])/100;

            return $sum;

        }

        private function calculateModel1($tariff, $consumption)
        {
            return $tariff['baseCost'] * 12 +
                ($tariff['additionalKwhCost']* $consumption)/100;

        }

    }