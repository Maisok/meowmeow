<?php

namespace App\Exports;

use App\Models\NewAppointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NewAppointmentsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return NewAppointment::with(['user', 'specialist', 'service'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User Name',
            'Specialist Name',
            'Service Name',
            'Name',
            'Phone',
            'Date',
            'Created At',
            'Updated At',
        ];
    }

    public function map($appointment): array
    {
        return [
            $appointment->id,
            $appointment->user->name,
            $appointment->specialist->name,
            $appointment->service->name,
            $appointment->name,
            $appointment->phone,
            $appointment->date,
            $appointment->created_at,
            $appointment->updated_at,
        ];
    }
}