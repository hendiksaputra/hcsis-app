<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Jobexperience;
use Illuminate\Support\Facades\DB;

class JobexperienceController extends Controller
{
    public function jobexperiences()
    { 
    $jobexperiences = DB::table('jobexperiences')
            ->join('employees', 'jobexperiences.employee_id', '=', 'employees.id')
            ->select('jobexperiences.*', 'fullname')
            ->orderBy('fullname', 'asc')
            ->simplePaginate(10);
        return view('jobexperience.index', ['jobexperiences' => $jobexperiences]);
    }

    public function addJobexperiences()
    {
        $employee = Employee::orderBy('id', 'asc')->get();
        return view('jobexperience.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'company_name' => 'required',
            'job_position' => 'required',
            'job_duration' => 'required',
            'quit_reason' => 'required',

        ]);
        $jobexperiences = Jobexperience::create($request->all());
        return redirect('admin/jobexperiences')->with('status', 'Jobexperiences Employee Add Successfully');
    }

    public function editJobexperiences($slug)
    {
        $jobexperiences = Jobexperience::where('slug', $slug)->first();
        $employee = Employee::orderBy('id', 'asc')->get();

        return view('jobexperience.edit', compact('jobexperiences', 'employee'));
    }

    public function updateJobexperiences(Request $request, $slug)
    {
        $jobexperiences = Jobexperience::where('slug', $slug)->first();
        $rules = [
            'employee_id' => 'required',
            'company_name' => 'required',
            'job_position' => 'required',
            'job_duration' => 'required',
            'quit_reason' => 'required',

        ];

        $validatedData = $request->validate($rules);
        Jobexperience::where('slug', $slug)->update($validatedData);

        return redirect('admin/jobexperiences')->with('status', 'Jobexperiences Employee Update Successfully');
    }

    public function deleteJobexperiences($slug)
    {

        $jobexperiences = Jobexperience::where('slug', $slug)->first();
        $jobexperiences->delete();
        return redirect('admin/jobexperiences')->with('status', 'Jobexperiences Employee Delete Successfully');
    }


}
