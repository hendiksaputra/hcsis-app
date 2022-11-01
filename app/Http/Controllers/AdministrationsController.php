<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\Administrations;
use Illuminate\Support\Facades\DB;

class AdministrationsController extends Controller
{
    public function administrations()
    {
        $administrations = DB::table('administrations')
            ->join('projects', 'administrations.project_id', '=', 'projects.id')
            ->join('employees', 'administrations.employee_id', '=', 'employees.id')
            ->join('positions', 'administrations.position_id', '=', 'positions.id')
            ->select('administrations.*', 'fullname', 'position_name','project_name')
            ->orderBy('fullname', 'asc')
            ->simplePaginate(10);
        return view('administration.index', ['administrations' => $administrations]);
    }

    public function AddAdministration()
    {
        $employee = Employee::orderBy('id', 'asc')->get();
        $projects = Project::orderBy('id', 'asc')->get();
        $positions = Position::orderBy('id', 'asc')->get();
        return view('administration.create', compact('employee','projects','positions'));
    }

    public function store(Request $request)
    {

       
        $validated = $request->validate([
            'employee_id' => 'required',
            'project_id' => 'required',
            'position_id' => 'required',
            'nik' => 'required',
            'class' => 'required',
            'doh' => 'required',
            'poh' => 'required',
            'basic_salary' => 'required',
            'site_allowance' => 'required',
            'other_allowance' => 'required',

        ]);
        $administration = Administrations::create($request->all());
        return redirect('admin/administrations')->with('status', 'Administration Employee Add Successfully');
    }

    public function editAdministration($slug)
    {
        $administrations = Administrations::where('slug', $slug)->first();
        $employee = Employee::orderBy('id', 'asc')->get();
        $projects = Project::orderBy('id', 'asc')->get();
        $positions = Position::orderBy('id', 'asc')->get();
        return view('administration.edit', compact('administrations', 'projects', 'positions','employee'));
    }

    public function updateAdministration(Request $request, $slug)
    {
        $administrations = Administrations::where('slug', $slug)->first();
        $rules = [
            'employee_id' => 'required',
            'project_id' => 'required',
            'position_id' => 'required',
            'nik' => 'required',
            'class' => 'required',
            'doh' => 'required',
            'poh' => 'required',
            'basic_salary' => 'required',
            'site_allowance' => 'required',
            'other_allowance' => 'required',

        ];

        $validatedData = $request->validate($rules);
        Administrations::where('slug', $slug)->update($validatedData);

        return redirect('admin/administrations')->with('status', 'Administration Employee Update Successfully');
    }

    public function deleteAdministration($slug)
    {

        $administrations = Administrations::where('slug', $slug)->first();
        $administrations->delete();
        return redirect('admin/administrations')->with('status', 'Administration Employee Delete Successfully');
    }

}
