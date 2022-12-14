<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentAgencyWeeklyReportAttachment extends Model
{
    protected $table = 'employment_agency_weekly_report_attachments';

    public function employmentAgencyWeeklyReport() {
        return $this->belongsTo(EmploymentAgencyWeeklyReport::class);
    }

}
