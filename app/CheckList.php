<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
         'name'
    ];

    public function checkListItems(){
        return $this->hasMany(CheckListItem::class);
    }

     /**
     * Get the report that owns the checklist.
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
