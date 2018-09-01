<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Employee;


class EmployeesController extends Controller
{
    public function create(){
        return view('employees.create',['skills' => Skill::all()]);
    }

    public function store(Request $request){

        $employee = $request->only(['fullName','email']);
        $skills= explode(',',$request->skills);

        $employee = Employee::create($employee);
        foreach($skills as $skill){
            if(Skill::where('name',$skill)->count() == 0){
                $skill = Skill::create(['name' => $skill]);
            }else{
                $skill = Skill::where('name',$skill)->get();
            }   
            $employee->skills()->attach($skill); 
        }

        return redirect('/employees/create');
    }
}
