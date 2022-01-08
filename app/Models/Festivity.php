<?php

namespace App\Models;
use App\Models\Municipality;
use App\Models\Festivity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festivity extends Model
{
    protected $table = 'festivities';
    use HasFactory;
    protected $guarded = ['id'];

    public function municipality() {
        return $this->belongsTo(Municipality::class);
    }
}