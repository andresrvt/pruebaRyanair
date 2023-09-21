<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'ident',              
        'status',             
        'gate_origin',        
        'progress_percent',   
        'origin_code',        
        'origin_city',        
        'destination_code',   
        'destination_city',   

    ];
    
}
