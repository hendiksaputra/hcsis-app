<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Emrgcall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmrgcallController extends Controller
{
    public function emrgcalls()
    { 
    $emrgcalls = DB::table('emrgcalls')
            ->join('employees', 'emrgcalls.employee_id', '=', 'employees.id')
            ->select('emrgcalls.*', 'fullname')
            ->orderBy('fullname', 'asc')
            ->simplePaginate(10);
        return view('emrgcall.index', ['emrgcalls' => $emrgcalls]);
    }

    public function addEmrgcall()
    {
        $employee = Employee::orderBy('id', 'asc')->get();
        return view('emrgcall.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'emrg_call_name' => 'required',
            'emrg_call_relation' => 'required',
            'emrg_call_phone' => 'required',
            'emrg_call_address' => 'required',

        ]);
        $emrgcalls = Emrgcall::create($request->all());
        return redirect('admin/emrgcalls')->with('status', 'Emergency Call Employee Add Successfully');
    }

    public function editEmrgcall($slug)
    {
        $emrgcalls = Emrgcall::where('slug', $slug)->first();
        $employee = Employee::orderBy('id', 'asc')->get();

        return view('emrgcall.edit', compact('emrgcalls', 'employee'));
    }

    public function updateEmrgcall(Request $request, $slug)
    {
        $emrgcalls = Emrgcall::where('slug', $slug)->first();
        $rules = [
            'employee_id' => 'required',
            'emrg_call_name' => 'required',
            'emrg_call_relation' => 'required',
            'emrg_call_phone' => 'required',
            'emrg_call_address' => 'required',

        ];

        $validatedData = $request->validate($rules);
        Emrgcall::where('slug', $slug)->update($validatedData);

        return redirect('admin/emrgcalls')->with('status', 'Emergency Call Employee Update Successfully');
    }

    public function deleteEmrgcall($slug)
    {

        $emrgcalls = Emrgcall::where('slug', $slug)->first();
        $emrgcalls->delete();
        return redirect('admin/emrgcalls')->with('status', 'Emergency Call Employee Delete Successfully');
    }


}
