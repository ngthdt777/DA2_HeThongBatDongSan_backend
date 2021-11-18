<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateMedia extends Model
{
    public $timestamps = false;

    protected $table = "real_estate_media";

    protected $fillable = [
        'id',
        'name',
        'realEstateId',
        'type',
        'path'
    ];
    public function realEstate() {
        return $this->belongsTo(RealEstatelModel::class);
    }
}