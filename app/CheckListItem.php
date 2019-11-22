<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $fillable = [
        'checklist_id', 'name'
    ];

    public function checkList()
    {
        return $this->belongsTo(CheckList::class);
    }
}
