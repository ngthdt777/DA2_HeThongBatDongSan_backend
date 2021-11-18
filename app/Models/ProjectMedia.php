<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMedia extends Model
{
    public $timestamps = false;

    protected $table = "project_media";

    protected $fillable = [
        'id',
        'name',
        'projectId',
        'type',
        'path'
    ];
    public function project() {
        return $this->belongsTo(ProjectMedia::class);
    }
}