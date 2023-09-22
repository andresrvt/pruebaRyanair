<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{

    public function createFlight(Request $request)
    {
        $theUrl     = config('app.guzzle_test_url') . '/api/users/create';
        $response = Http::post($theUrl, [
            'name' => $request->name,
            'email' => $request->email
        ]);
        dd($response);
        return $response;
    }

    public function getFlights()
    {
        $apiKey = 'aW21dg0PAgsIVPbdxe4Fvx7TI3uej00M';
        $fxmlUrl = "https://aeroapi.flightaware.com/aeroapi/airports/SVQ/flights/scheduled_arrivals";
    
        $ident = 'SWA45';
        $queryParams = array(
            'max_pages' => 2
        );
        $url = $fxmlUrl . '?' . http_build_query($queryParams);
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-apikey: ' . $apiKey));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
        if ($result = curl_exec($ch)) {
            curl_close($ch);
            $data = json_decode($result, true);
    
            if (isset($data['scheduled_arrivals']) && is_array($data['scheduled_arrivals'])) {
                $flights = [];
    
                foreach ($data['scheduled_arrivals'] as $arrival) {
                    // Definir las condiciones para buscar un registro existente
                    $conditions = ['ident' => $arrival['ident']];
    
                    // Definir los valores a actualizar o insertar
                    $values = [
                        'status' => $arrival['status'],
                        'gate_origin' => $arrival['gate_origin'],
                        'progress_percent' => $arrival['progress_percent'],
                    ];
    
                    // Intentar actualizar o insertar el registro
                    Flight::updateOrInsert($conditions, $values);
    
                    // Recuperar el registro actualizado o insertado
                    $flight = Flight::where($conditions)->first();
    
                    if (isset($arrival['origin'])) {
                        $flight->origin_code = $arrival['origin']['code'];
                        $flight->origin_city = $arrival['origin']['city'];
                    }
    
                    if (isset($arrival['destination'])) {
                        $flight->destination_code = $arrival['destination']['code'];
                        $flight->destination_city = $arrival['destination']['city'];
                    }
    
                    $flight->created_at = now();
                    $flight->save();
                    $flights[] = $flight;
                                 
                }
    
                return view('main', ['flights' => $flights]);
            }
        }
    }
    
}