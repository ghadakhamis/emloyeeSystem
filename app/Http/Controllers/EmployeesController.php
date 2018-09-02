<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Employee;
use App\Http\Requests\StoreEmployeeRequest;


class EmployeesController extends Controller
{
    public function start(){
        return view('index',['employees' => Employee::paginate(5),'skills' => Skill::all()]);
    }

    public function create(){
        return view('employees.create',['employees' => Employee::paginate(5),'skills' => Skill::all()]);
    }

    public function store(StoreEmployeeRequest $request){

        $employee = $request->only(['fullName','email']);
        $employee = Employee::create($employee);

        if($request->only('skills')){
            $skills = $request->only('skills');

            foreach($skills['skills'] as $skill){
                $employee->skills()->attach($skill);   
            }
        }

        return redirect('/');
    }

    public function edit(Employee $employee){
        $skillsId=[];
        foreach($employee->skills()->get() as $empSkill){
            $skillsId[] = $empSkill->id;
        }
        return view('index',['employees' => Employee::paginate(5),'employee' => $employee,'skills' => Skill::all(),'skillsId'=> $skillsId]);
    }

    public function update(Employee $employee,Request $request){
        $employee->update($request->only(['fullName','email']));
        $employee->skills()->sync($request->skills);
        return redirect('/');
    }

    public function destroy(Employee $employee){
        $employee->skills()->detach();
        $employee->delete();
        return redirect('/'); 
    }
}
