<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
class AreaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

   public function index()   //http://api.codersfree.test/v1/categories?included=posts
    {

        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');
        // return $categories;
        return view('areas.index', compact('areas'));
    }
        public function show($id)
    {

        $url = env('URL_SERVER_API');

        $category = $this->fetchDataFromApi($url . '/categories/' . $id);

        return view('categories.show', compact('category'));
    }
    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/categories', $request->all());

        return redirect()->route('categories.index');
    }
   public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $category = $this->fetchDataFromApi($url . '/categories/' . $id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/categories/' . $id, $request->all());

        return redirect()->route('categories.index');
    }
}
