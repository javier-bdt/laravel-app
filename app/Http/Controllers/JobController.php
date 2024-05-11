<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(10);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function showJob(Job $job)
    {
        // its same as below
        return view('jobs.show', ['job' => $job]);
        // its same as below
        /*
        return view('jobs.show', [
            'job' => Job::find($id)
        ]);
        */
    }

    public function createJob()
    {
        return view('jobs.create');
    }

    public function storeJob(Request $request)
    {
        // first we need to do user authentication

        $request->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'employer_id' => 1
        ]);
        return redirect('/jobs');
    }

    public function editJob(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function updateJob(Request $request, Job $job)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => $request->title,
            'salary' => $request->salary,
        ]);
        return redirect('/jobs/' . $job->id);
    }

    public function destroyJob(Job $job)
    {
        Job::destroy($job);
        return redirect('/jobs');
    }
}