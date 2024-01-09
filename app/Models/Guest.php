<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Guest as Authenticatable;

class Guest extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];
}
