<?php

namespace App\Models;
use App\Models\Municipality;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festivity extends Model
{
    protected $table = 'work_calendar';
    //use HasFactory;
    protected $guarded = ['festivity_id'];


}
