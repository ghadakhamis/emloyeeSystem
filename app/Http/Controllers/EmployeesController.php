<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Employee;


class EmployeesController extends Controller
{
    public function start(){
        return view('index',['employees' => Employee::paginate(5),'skills' => Skill::all()]);
    }

    public function create(){
        return view('employees.create',['employees' => Employee::paginate(5),'skills' => Skill::all()]);
    }

    public function store(Request $request){

        $employee = $request->only(['fullName','email']);
        $skills = $request->only('skills');

        $employee = Employee::create($employee);
        foreach($skills['skills'] as $skill){
            $skillObj = json_decode($skill);
            $employee->skills()->attach($skillObj->id);   
        }

        return redirect('/');
    }

    public function edit(Employee $employee){
        return view('index',['employees' => Employee::paginate(5),'employee' => $employee]);
    }

    public function update(Employee $employee,Request $request){
        dd($request);
    }

    public function destroy(Employee $employee){
        $employee->skills()->detach();
        $employee->delete();
        return redirect('/'); 
    }
}
