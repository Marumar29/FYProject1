<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
app/Models/HazardEntry.php


class HazardEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'department', 'section', 'responsible_person', 'report_date', 'revision_no', 'activity',
        'task', 'hazard', 'risk', 'likelihood', 'severity', 'significant', 'control', 'remarks',
        'hirarc_report_id'
    ];

    public function hirarcReport()
    {
        return $this->belongsTo(HirarcReport::class, 'hirarc_report_id');
    }
}
