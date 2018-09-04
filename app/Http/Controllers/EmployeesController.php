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
        return view('index',['employees' => Employee::paginate(5),'skills' => Skill::all()]);
    }

    public function store(StoreEmployeeRequest $request){

        $employee = $request->only(['fullName','email']);
        $employee = Employee::create($employee);

        $skills = explode(',',$request['hidden-skills']);
        foreach($skills as $skill){
            if($skillObj= Skill::where('name',$skill)->first()){
                $employee->skills()->attach($skillObj->id);   
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

    public function update(Employee $employee,StoreEmployeeRequest $request){
        $employee->update($request->only(['fullName','email']));

        $skillsName = explode(',',$request['hidden-skills']);
        $skills = [];
        foreach($skillsName as $skillName){
            if($skillObj= Skill::where('name',$skillName)->first()){
                $skills[] = $skillObj->id;   
            }
        }

        $employee->skills()->sync($skills);
        return redirect('/');
    }

    public function destroy(Employee $employee){
        $employee->skills()->detach();
        $employee->delete();
        return redirect('/'); 
    }
}
