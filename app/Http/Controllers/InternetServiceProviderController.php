<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternetServiceProviderResource;
use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use App\Traits\ResponserTraits;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{
    use ResponserTraits;
    public function getMptInvoiceAmount(Request $request)
    {
        $mpt = new Mpt();
        $amount = $this->calculateTotalAmount($mpt, $request);

        return $this->responseSuccess(new InternetServiceProviderResource($amount));
    }

    public function getOoredooInvoiceAmount(Request $request)
    {
        $ooredoo = new Ooredoo();
        $amount = $this->calculateTotalAmount($ooredoo, $request);
        return $this->responseSuccess(new InternetServiceProviderResource($amount));
    }

    private function calculateTotalAmount($provider, $request): int
    {
        $provider->setMonth($request->get('month') ?: 1);
        $amount = $provider->calculateTotalAmount();

        return $amount;
    }
}
