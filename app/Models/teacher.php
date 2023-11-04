<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory, HasUUID;

    protected $fillable = [
        'name','mapel_id'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

}
