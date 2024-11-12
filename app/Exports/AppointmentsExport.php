<?php
namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppointmentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Appointment::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Phone',
            'Created At',
            'Updated At',
        ];
    }
}