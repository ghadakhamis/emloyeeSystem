<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Employee;


class EmployeesController extends Controller
{
    public function start(){
        return view('index',['employees' => Employee::paginate(5)]);
    }

    public function create(){
        return view('employees.create',['employees' => Employee::paginate(5)]);
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
