<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class EmployeesController extends Controller
{
    public function create(){
        return view('employees.create',['skills' => Skill::all()]);
    }

    public function store(Request $request){

        $employee = $request->only(['fullName','email']);
        $skills= $request->only('skills');
    }
}
