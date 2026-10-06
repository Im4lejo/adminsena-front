<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AreaController extends Controller
{
    public function index()   //http://api.codersfree.test/v1/categories?included=posts
    {
        $url = rtrim((string) env('URL_SERVER_API'), '/') . '/areas';
        $response = Http::acceptJson()->get($url);
        $response->throw();

        $areas = $response->json();
        if (is_array($areas) && array_key_exists('data', $areas)) {
            $areas = $areas['data'];
        }

        $areasLoadError = ! is_array($areas);
        if ($areasLoadError) {
            Log::warning('The areas API returned an unexpected response.', [
                'status' => $response->status(),
            ]);
            $areas = [];
        }

        return view('areas.index', compact('areas', 'areasLoadError'));
    }
}