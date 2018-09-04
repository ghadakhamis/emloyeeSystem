<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class SkillsController extends Controller
{
    public function index(Request $request){
        $skills=Skill::where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json( $skills);
    }
}
