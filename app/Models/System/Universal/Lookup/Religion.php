<?php

namespace App\Models\System\Universal\Lookup;

use App\Models\Serviceperson\Dependent;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    public $fillable = ['name'];

    public function serviceperson(){
        return $this->hasOne(Serviceperson::class);
    }

    public function dependent(){
        return $this->hasOne(Dependent::class);
    }
}
