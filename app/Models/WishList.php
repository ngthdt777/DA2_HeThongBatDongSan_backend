<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    public $timestamps = false;

    protected $table = "wish_lists";

    protected $fillable = [
        'userId'
    ];

    public function wishListRealEstate(){
        return $this->hasMany(wishListRealEstate::class, 'wishListId','id' );
    }
    public function user(){
        return $this->belongsTo(UserModel::class, 'userId','id' );
    }
}