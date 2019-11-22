<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkItem extends Model
{

    protected $fillable = [
        'report_id', 'name', 'quantity', 'quantity_type'
    ];
    
    /**
     * Get the report that owns the work item.
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
