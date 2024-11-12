<?php

namespace App\Http\Controllers;
use App\Exports\NewAppointmentsExport;
use App\Exports\AppointmentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportAppointments()
    {
        return Excel::download(new AppointmentsExport, 'appointments.xlsx');
    }

    
    public function exportNewAppointments()
    {
        return Excel::download(new NewAppointmentsExport, 'new_appointments.xlsx');
    }
}