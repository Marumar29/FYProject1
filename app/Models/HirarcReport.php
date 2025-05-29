<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HirarcReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'task',
        'hazard',
        'risk',
        'likelihood',
        'severity',
        'risk_rating',
        'control_measure',
        'prepared_by_name',
        'prepared_by_position',
        'prepared_date',
        'reviewed_by_name',
        'reviewed_by_position',
        'reviewed_date',
        'approved_by_name',
        'approved_by_position',
        'approved_date',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
