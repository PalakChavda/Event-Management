<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['event_title', "start_date",'end_date','recurrence','repeat_time', "repeat_on_time",'cycle','week_of_day','months'];
}
