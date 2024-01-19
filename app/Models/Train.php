<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function facilities()
    {
        return $this->hasMany(TrainFacility::class);
    }
}
