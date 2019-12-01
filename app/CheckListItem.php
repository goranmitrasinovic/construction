<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $fillable = [
       'checked', 'checklist_id', 'name'
    ];

    protected $casts = [
        'checked' => 'boolean',
    ];

    public function checkList()
    {
        return $this->belongsTo(CheckList::class);
    }
}
