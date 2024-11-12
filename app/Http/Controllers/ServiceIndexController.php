<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\NewAppointment;

class ServiceIndexController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('service', compact('services'));
    }

    public function show(Service $service)
    {
        return view('showservices', compact('service'));
    }

    public function storeAppointment(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date|after_or_equal:today', // Проверка на дату, не раньше сегодняшнего дня
            'staff' => 'required|exists:staff,id', // Проверка на существование сотрудника
        ]);

        $newAppointment = new NewAppointment();
        $newAppointment->name = $request->name;
        $newAppointment->phone = $request->phone;
        $newAppointment->date = $request->date;
        $newAppointment->service_id = $service->id;
        $newAppointment->staff_id = $request->staff;
        $newAppointment->user_id = auth()->id(); // Предполагается, что пользователь авторизован
        $newAppointment->save();

        return redirect()->route('services.show', $service)->with('success', 'Запись успешно создана.');
    }
}
