<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    protected $table = "projects";

    protected $fillable = [
        'name',
        'investor',
        'introduce',
        'info',
        'customerBenefit',
        'procedure',
    ];

    public function projectMedia()
    {
        return $this->hasMany(ProjectMedia::class, 'projectId','id' );
    }
}