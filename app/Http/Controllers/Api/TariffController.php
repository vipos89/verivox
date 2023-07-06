<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\CompareRequest;
    use App\Interfaces\Services\TariffCompareServiceInterface;
    use App\Services\TariffProviderService;
    use Illuminate\Http\Request;

    class TariffController extends Controller
    {
        public function __construct(
            public TariffProviderService $tariffProviderService,
            public TariffCompareServiceInterface $tariffCompareService
        ) {
        }

        public function compare(CompareRequest $request)
        {
            $tariffs = $this->tariffProviderService->getTariffs();
            return response()
                ->json(
                    $this->tariffCompareService->compare(
                        $tariffs,
                        $request->input('consumption')
                    )
                );
        }
    }
