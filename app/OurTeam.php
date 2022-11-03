<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    protected $fillable = ['name', 'designation', 'mobile', 'image'];
}
