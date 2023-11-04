<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory, HasUUID;

    protected $fillable = [
        'nama',
    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
