<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutModels extends Model
{
    use HasFactory;

    public function train()
    {
        return $this->belongsTo(Train::class);
    }
}
