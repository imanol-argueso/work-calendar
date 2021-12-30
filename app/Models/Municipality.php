<?php

namespace App\Models;
use App\Models\Municipality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality
{
    public $municipality_code;
    public $municipality_name_es;
    public $municipality_name_eu;
    public $territory;
    public $festivity_name_es;
    public $festivity_name_eu;
    public $municipality_lat;
    public $municipality_lon;

    public function __construct ($municipality_code, $municipality_name_es, $municipality_name_eu, $territory, $festivity_name_es, $festivity_name_eu, $municipality_lat, $municipality_lon){
          $this->municipality_code = $municipality_code;
          $this->municipality_name_es = $municipality_name_es;
          $this->municipality_name_eu = $municipality_name_eu;
          $this->territory = $territory;
          $this->festivity_name_es = $festivity_name_es;
          $this->festivity_name_eu = $festivity_name_eu;
          $this->municipality_lat = $municipality_lat;
          $this->municipality_lon = $municipality_lon;
      }
}