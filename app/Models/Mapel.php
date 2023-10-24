<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Mapel extends Model
{
    use HasFactory, HasUUID;

    protected $fillable = [
        'nama',
    ];
}
