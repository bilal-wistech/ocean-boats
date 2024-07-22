<?php

namespace Botble\Ecommerce\Http\Controllers\Fronts;

use Illuminate\Http\Request;
use Botble\Ecommerce\Models\Currency;
use Botble\Base\Http\Responses\BaseHttpResponse;
use NaeemAwan\PredefinedLists\Models\PredefinedList;
use Botble\Ecommerce\Repositories\Interfaces\CurrencyInterface;

class PublicEcommerceController
{
    protected CurrencyInterface $currencyRepository;

    public function __construct(CurrencyInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function changeCurrency(Request $request, BaseHttpResponse $response, ?string $title = null)
    {
        if (empty($title)) {
            $title = $request->input('currency');
        }

        if (!$title) {
            return $response;
        }

        $currency = $this->currencyRepository->getFirstBy(['title' => $title]);

        if ($currency) {
            cms_currency()->setApplicationCurrency($currency);
        }

        return $response;
    }
    public function convertCurrency(Request $request)
    {
        $code = $request->input('code');
        $optionIds = json_decode($request->input('optionIds'), true);
        $boatPrice = $request->input('boatPrice');

        \Log::info('Currency Code: ' . $code);
        \Log::info('Option IDs: ' . json_encode($optionIds));
        \Log::info('Boat Price: ' . $boatPrice);

        $currency = Currency::where('title', $code)->first();
        if (!$currency) {
            return response()->json(['error' => 'Invalid currency code'], 400);
        }

        $prices = [];
        foreach ($optionIds as $optionId) {
            $option = PredefinedList::find($optionId);
            if ($option && $option->price !== null) {
                $formattedPrice = format_price($option->price, $currency, false, true);
                $prices[$optionId] = $formattedPrice;
                \Log::info("Formatted price for ID $optionId: " . $formattedPrice);
            } else {
                \Log::warning("No price found for ID $optionId");
            }
        }

        // Calculate totals
        $subTotal = format_price($boatPrice, $currency, false, true);
        $vat = format_price(($boatPrice * 5) / 100, $currency, false, true);
        $total = format_price($boatPrice + ($boatPrice * 5) / 100, $currency, false, true);

        $totals = [
            'subTotal' => $subTotal,
            'vat' => $vat,
            'total' => $total,
        ];

        return response()->json([
            'success' => true,
            'code' => $code,
            'optionIds' => $optionIds,
            'prices' => $prices,
            'totals' => $totals,
        ]);
    }
}
