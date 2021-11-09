<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateType extends Model
{
    public $timestamps = false;

    protected $table = "real_estate_types";

    protected $fillable = [
        'name'
    ];
}