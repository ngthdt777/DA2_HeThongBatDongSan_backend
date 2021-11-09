<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $timestamps = false;

    protected $table = "users";

    protected $fillable = [
        'name',
        'userRoleId',
        'email',
        'DoB',
        'password',
        'phone'
    ];
       
    public function role()
    {
        return $this->hasOne(UserRole::class, 'id', 'userRoleId');
    }

    public function wishList()
    {
        return $this->hasOne(WishList::class, 'userId', 'id');
    }
}