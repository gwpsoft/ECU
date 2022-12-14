<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentAgencyWeeklyReport extends Model
{
    protected $table = 'employment_agency_weekly_reports';

    public function employmentAgencyWeeklyReportAttachments() {
        return $this->hasMany(EmploymentAgencyWeeklyReportAttachment::class, 'employment_agency_weekly_report_id', 'id');
    }

    public function employmentAgencyWeeklyReportDetails() {
        return $this->hasMany(EmploymentAgencyWeeklyReportDetail::class)->orderBy('Name');
    }

}
