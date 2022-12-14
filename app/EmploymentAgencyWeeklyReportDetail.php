<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentAgencyWeeklyReportDetail extends Model
{
    protected $table = 'employment_agency_weekly_report_details';

    public function employmentAgencyWeeklyReport() {
        return $this->belongsTo(EmploymentAgencyWeeklyReport::class);
    }

}
