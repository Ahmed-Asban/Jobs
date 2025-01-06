<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    //


    public function index()
    {

        //this shows page number
    //$job = Job::with('employer')->simplePaginate(3);

    //this does not show page number
    //$job = Job::with('employer')->simplePaginate(3);

    $jobs = Job::with('employer')->simplePaginate(3);

    return view('jobs.index', [
        'jobs'=>  $jobs
    ]);

    }

    public function create()
    {

        if ( Auth::guest() )
        {
            return redirect(route('login'));
        }

        return view('jobs.create');


    }

    public function show(Job $job)
    {

        // $job = Job::find($id);


    return view('jobs.show', ['job' => $job]);

    }

    public function store()
    {

        //dd(request()->all());

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);


    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 422

    ]);

     return redirect(route('job.index'));

    }

    public function edit(Job $job)
    {

        //$job = Job::find($id);




        // if ( Auth::guest() )
        // {
        //     return redirect(route('login.create'));
        // }

        //this way laravel does return the response
        //Gate::authorize('edit-job', $job);


        //this way in case you want to handle it with other ways like this: returning 404 response (custom response)
        // if (Gate::denies('edit-job', $job))
        // {

        //     abort(404);

        // }



        // if ($job->employer->user->isNot(Auth::user()))
        // {
        //     abort(403);
        // }



    return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job $job)
    {

        Gate::authorize('edit-job', $job);

        //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);


    //authorize (on hold.......)

    //update the job
    //$job = Job::findOrFail($id);

    //first way of update
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    //second way of update
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    //and persist

    //redirect to the job page
    //return redirect('/jobs/' . $job->id);
    return redirect(route('job.show', ['job' => $job]));


    }

    public function destroy(Job $job)
    {

    //authorize (on hold.......)
    Gate::authorize('edit-job', $job);


    //delete the job
    //first way
    // $job = Job::findOrFail($id);
    // $job->delete();

    //second way
    //Job::findOrFail($id)->delete();
    $job->delete();

    //redirect
    return redirect(route('job.index'));

    }


}
