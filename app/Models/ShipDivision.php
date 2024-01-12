<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipDivision extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_name',
    ];

    public function district(){
        return $this->hasMany(ShipDistrict::class,'district_id','id');
    }

    public function state(){
        return $this->hasMany(ShipState::class,'state_id','id');
    }
}
 