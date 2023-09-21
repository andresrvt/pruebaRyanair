<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{

    public function createFlight(Request $request){
        $theUrl     = config('app.guzzle_test_url').'/api/users/create';
          $response= Http::post($theUrl, [
              'name'=>$request->name,
              'email'=>$request->email
          ]);
          dd($response);
          return $response;
        }



    public function index()
    {
        $apiKey = env('FLIGHTAWARE_API_KEY');

        $response = Http::get('https://api.flightaware.com/endpoint', [
            'apiKey' => $apiKey,
            // Otros parámetros de solicitud
        ]);

        $data = $response->json();

        
        $flights = []; // Los datos de vuelo obtenidos de la API
        dd($flights);

        return inertia('app', ['flights' => $flights]);
    }
}
