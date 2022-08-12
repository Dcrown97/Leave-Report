<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_type extends Model
{
    protected $table = 'leave_types';
    protected $fillable = ['leave_type', 'num_of_days'];
}
