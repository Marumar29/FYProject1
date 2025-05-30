<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HirarcReport extends Model
{
    use HasFactory;

    protected $table = 'hirarc_reports';

    protected $fillable = [
        'prepared_by_position', 'prepared_date',
        'reviewed_by_position', 'reviewed_date',
        'approved_by_position', 'approved_date',
        'organization_id',
        // Add signature paths here if you store them in this table
        'signature_prepared', 'signature_reviewed', 'signature_approved'
    ];

    public function hazardEntries()
    {
        return $this->hasMany(HazardEntry::class, 'hirarc_report_id');
    }
}
