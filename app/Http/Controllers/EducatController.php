<?php

namespace App\Http\Controllers;

use App\Models\Educat;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducatController extends Controller
{
    public function educats()
    {   
        $educats = DB::table('educats')
            ->join('employees', 'educats.employee_id', '=', 'educats.id')
            ->select('educats.*', 'fullname')
            ->orderBy('fullname', 'asc')
            ->paginate(10);
        return view('educat.index', ['educats' => $educats]);
       
    }

    public function AddEducat()
    {
        $employee = Employee::orderBy('id', 'asc')->get();
        return view('educat.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'education_level' => 'required',
            'education_name' => 'required',
            'education_year' => 'required',
            'education_remarks' => 'required',
           

        ]);
        $educations = Educat::create($request->all());
        return redirect('admin/educats')->with('status', 'Education Employee Add Successfully');
    }
}
