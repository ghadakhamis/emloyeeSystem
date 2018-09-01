<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullName', 'email',
    ];

    public function skills(){
        return $this->belongsToMany(Skill::class)->withTimestamps();
    }
}
