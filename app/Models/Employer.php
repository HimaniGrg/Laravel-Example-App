<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    public function jobs(){
        //employer->job
        //as the employer can list multiple jobs
        return $this->hasMany(Job::class);
        
    }
    public function user(){
        //employer->job
        //as the employer can list multiple jobs
        return $this->belongsTo(User::class);
        
    }
}
