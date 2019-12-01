<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'name', 'report_type', 'location', 'description', 'start_date', 'end_date', 'checklist_id'
    ];

    public function workItems(){
        return $this->hasMany(WorkItem::class);
    }

    public function checkList(){
        return $this->belongsToMany(CheckList::class);
    }
}
