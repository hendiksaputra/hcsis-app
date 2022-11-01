<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Gender;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function employees()
    { 
    $employees = DB::table('employees')
            ->join('religions', 'employees.religion_id', '=', 'religions.id')
            ->join('genders', 'employees.gender_id', '=', 'genders.id')
            ->select('employees.*', 'name_gender','name_religion')
            ->orderBy('fullname', 'asc')
            ->simplePaginate(10);
        return view('employee.index', ['employees' => $employees]);
    }

    public function addEmployee()
    {
        $religions = Religion::orderBy('name_religion', 'asc')->get();
        $genders = Gender::orderBy('name_gender', 'asc')->get();
        return view('employee.create', compact('religions','genders'));
    }

    public function store(Request $request)
    {

        // $validated = $request->validate([
        //     'fulname' => 'required',
        //     'pob' => 'required',
        // ]);

        
       $newName = '';

        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->fullname.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('image', $newName);
        }

        $request['image'] = $newName;

        $employee = Employee::create($request->all());
        return redirect('admin/employees')->with('status', 'Employee added successfully');
    }

}
