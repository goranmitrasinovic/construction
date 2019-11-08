<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'report_type', 'location', 'description', 'start_date', 'end_date'
    ];
}
