<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measurement_type extends Model
{
    protected $fillable = ['types', 'type_unit', 'type_slug'];
}
