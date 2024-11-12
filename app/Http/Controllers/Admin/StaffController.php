<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        $specialists = Specialist::all();
        return view('staff.create', compact('specialists'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'specialist_id' => 'required|exists:specialists,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $staff = new Staff();
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->position = $request->position;
        $staff->specialist_id = $request->specialist_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('staff', 'public');
            $staff->image = $imagePath;
        }

        $staff->save();

        return redirect()->route('admin.staff.index')->with('success', 'Сотрудник успешно добавлен!');
    }

    public function edit(Staff $staff)
    {
        $specialists = Specialist::all();
        return view('staff.edit', compact('staff', 'specialists'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'specialist_id' => 'required|exists:specialists,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->position = $request->position;
        $staff->specialist_id = $request->specialist_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('staff', 'public');
            $staff->image = $imagePath;
        }

        $staff->save();

        return redirect()->route('admin.staff.index')->with('success', 'Сотрудник успешно обновлен!');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Сотрудник успешно удален!');
    }
}