<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{
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
