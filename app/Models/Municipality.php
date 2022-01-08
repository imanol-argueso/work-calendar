<?php

namespace App\Models;
use App\Models\Municipality;
use App\Models\Festivity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';
    use HasFactory;
    protected $guarded = ['id'];
 
    public function festivities() {
        return $this->hasMany(Festivity::class);
    }
}