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
            'max_pages' => 1
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
    
                    // Verifica si ya existe un registro con estas condiciones
                    $existingFlight = Flight::where($conditions)->first();
    
                    // Definir los valores a actualizar o insertar
                    $values = [
                        'status' => $arrival['status'],
                        'gate_origin' => $arrival['gate_origin'],
                        'progress_percent' => $arrival['progress_percent'],
                    ];
    
                    if ($existingFlight) {
                        // Si ya existe, actualiza el registro existente
                        $existingFlight->update($values);
                        $flight = $existingFlight;
                    } else {
                        // Si no existe, crea un nuevo registro
                        $flight = new Flight($values);
                        $flight->ident = $arrival['ident'];
                        $flight->save();
                    }
    
                    // Resto del código para asignar otros valores si es necesario
    
                    $flights[] = $flight;
                }
    
                // Por ejemplo:
                $existingIdentifiers = Flight::pluck('ident')->toArray();
                $newIdentifiers = array_column($data['scheduled_arrivals'], 'ident');
    
                $identifiersToAdd = array_diff($newIdentifiers, $existingIdentifiers);
    
                foreach ($identifiersToAdd as $identifier) {
                    // Crea un nuevo registro para los vuelos que no existen
                    $newFlight = new Flight([
                        'ident' => $identifier,
                        // Otros campos si es necesario
                    ]);
                    $newFlight->save();
                    $flights[] = $newFlight;
                }
    
                return view('main', ['flights' => $flights]);
            }
        }
    }
    
    
    
}
