<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Operableunit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperableunitController extends Controller
{
    public function operableunits()
    { 
    $operableunits = DB::table('operableunits')
            ->join('employees', 'operableunits.employee_id', '=', 'employees.id')
            ->select('operableunits.*', 'fullname')
            ->orderBy('fullname', 'asc')
            ->simplePaginate(10);
        return view('operableunit.index', ['operableunits' => $operableunits]);
    }

    public function addOperableunits()
    {
        $employee = Employee::orderBy('id', 'asc')->get();
        return view('operableunit.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'unit_name' => 'required',
            'unit_type' => 'required',
            'unit_remarks' => 'required',

        ]);
        $operableunits = Operableunit::create($request->all());
        return redirect('admin/operableunits')->with('status', 'Operable Units Employee Add Successfully');
    }

    public function editOperableunits($slug)
    {
        $operableunits = Operableunit::where('slug', $slug)->first();
        $employee = Employee::orderBy('id', 'asc')->get();

        return view('operableunit.edit', compact('operableunits', 'employee'));
    }

    public function updateOperableunits(Request $request, $slug)
    {
        $operableunits = Operableunit::where('slug', $slug)->first();
        $rules = [
            'employee_id' => 'required',
            'unit_name' => 'required',
            'unit_type' => 'required',
            'unit_remarks' => 'required',
        ];

        $validatedData = $request->validate($rules);
        Operableunit::where('slug', $slug)->update($validatedData);

        return redirect('admin/operableunits')->with('status', 'Operable Units Employee Update Successfully');
    }

    public function deleteOperableunits($slug)
    {

        $operableunits = Operableunit::where('slug', $slug)->first();
        $operableunits->delete();
        return redirect('admin/operableunits')->with('status', 'Operable Units Employee Delete Successfully');
    }

}
