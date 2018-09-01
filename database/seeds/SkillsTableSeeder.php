<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills= ['PHP','ASP.NET','IOS','Android'];
        foreach($skills as $skill){
            Skill::create(['name' => $skill]);
        }
    }
}
