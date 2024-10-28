<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index(){
        //eager loading    
    $jobs = Job::with('employer')->latest()->Paginate(4);

    //lazy loading
    // return view('jobs',
    // ['jobs'=> Job::all()]);

    return view('jobs.index',
    ['jobs'=> $jobs]);
    }

    public function create(){
        return view('jobs.create');
    }

    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);

    }

    public function store(){
         //validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary'=>['required']
    ]);

    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
    }

    public function edit(Job $job){
        
        // if(Auth::user()->cannot('edit-job', $job)){
        //     dd('Failure');
        // }
        // Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job $job){
    //authorize the request(On hold....)

    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary'=>['required']
    ]);
    
    //update the job
    // $job = Job::findOrFail($id);   //use instead of find() to handle exception

    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary')
    ]);

    return redirect('/jobs/'.$job->id);
    }

    public function destory(Job $job){
         //authorize (On hold...)

    //delete the job
    // Job::findOrFail($id)->delete();
    $job->delete();

    //redirect
    return redirect('/jobs');
    }
}
