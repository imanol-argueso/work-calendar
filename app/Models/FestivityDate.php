<?php

namespace App\Models;
use App\Models\Municipality;
use App\Models\Festivity;
use App\Models\MunicipalityForApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivityDate
{
    public $date;
    public $items = [];

    public function __construct ($date, $municipality_code, $municipality_name_es, $municipality_name_eu, $territory, $festivity_name_es, $festivity_name_eu, $municipality_lat, $municipality_lon){
            $this->date = $date;
            $i = new MunicipalityForApi(
                $municipality_code, 
                $municipality_name_es, 
                $municipality_name_eu, 
                $territory,
                $festivity_name_es, 
                $festivity_name_eu,
                $municipality_lat,
                $municipality_lon
            );
            array_push($this->items, $i);
    }
    public function addFestivityDate($date, MunicipalityForApi $municipality) {
        $this->date = $date;
        array_push($this->items, $municipality);
    }
}

  
