<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $table = 'featured';

    protected $fillable = ['happy_patients', 'success_mission', 'qualified_doctors', 'years_of_experience'];
}
