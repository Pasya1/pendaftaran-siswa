<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{

    protected $table = 'sites';
    protected $fillable = ['primary_color', 'secondary_color'];
}
