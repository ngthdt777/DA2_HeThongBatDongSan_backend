<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListRealEstate extends Model
{
    public $timestamps = false;

    protected $table = "wish_list_real_estates";

    protected $fillable = [
        'wishListId',
        'realEstateId'
    ];

    public function realEstate(){
        return $this->hasMany(RealEstate::class, 'id','realEstateId' );
    }
}