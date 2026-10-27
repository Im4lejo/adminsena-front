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

        return view('areas.index', compact('areas'));
    }
    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('areas.show', compact('area'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = Http::get($url . '/areas')->json();

        return view('areas.create', compact('areas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/areas',['name' => $request->name,]);

        return redirect()->route('areas.index');
    }
    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $area = $this->fetchDataFromApi($url . '/areas/' . $id);
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/areas/' . $id, $request->all());

        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/areas/' . $id);
        return redirect()->route('areas.index');
    }

}
