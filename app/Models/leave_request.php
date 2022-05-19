<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_request extends Model
{
    protected $table = 'leave_requests';
    protected $fillable = ['staff_id', 'leave_type_id', 'num_of_days', 'commencement_date', 'reumption_date', 'remarks'];
}
