<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    public $timestamps = false;

    protected $table = "real_estates";

    protected $fillable = [
        'areaId',
        'typeId',
        'userId',
        'sold',
        'name',
        'orientation',
        'acreage',
        'price',
        'address',
        'floor',
        'numberOfRoom',
        'description',
        'dateCreated',
        'dateModified'
    ];

    public function area(){
        return $this->belongsTo(Area::class, 'areaId','id' );
    }

    public function realEstateType(){
        return $this->hasOne(RealEstateType::class, 'id','typeId');
    }

    public function user(){
        return $this->belongsTo(UserModel::class, 'userId','id' );
    }

    public function realEstateMedia(){
        return $this->hasMany(RealEstateMedia::class, 'realEstateId','id' );
    }
}