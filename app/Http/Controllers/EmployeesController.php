<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Employee;


class EmployeesController extends Controller
{
    public function start(){
        return view('index',['employees' => Employee::all()]);
    }

    public function create(){
        return view('employees.create',['employees' => Employee::all()]);
    }

    public function store(Request $request){

        $employee = $request->only(['fullName','email']);
        $skills= explode(',',$request->skills);

        $employee = Employee::create($employee);
        foreach($skills as $skill){
            if(Skill::where('name',$skill)->count() == 0){
                $skillObj = Skill::create(['name' => $skill]);
            }else{
                $skillObj = Skill::where('name',$skill)->get();
            } 
            
            if($employee->skills()->where('name',$skill)->count() == 0){
                $employee->skills()->attach($skillObj); 
            }  
        }

        return redirect('/');
    }

    public function edit(Employee $employee){
        return view('index',['employees' => Employee::all(),'employee' => $employee]);
    }

    public function destroy(Employee $employee){
        $employee->skills()->detach();
        $employee->delete();
        return redirect('/'); 
    }
}
