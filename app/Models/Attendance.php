<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
    'guest_name',
    'purpose',
    'visit_date',
];
} 