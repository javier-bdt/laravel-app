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
    public function show(Job $job)
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
    public function create()
    {
        return view('jobs.create');
    }
    public function store(Request $request)
    {
        // first we need to do user authentication

        $this->validateJob();
        $job = Job::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'employer_id' => 1
        ]);
        return redirect('/jobs');
    }
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Request $request, Job $job)
    {
        $this->validateJob();
        $job->update([
            'title' => $request->title,
            'salary' => $request->salary,
        ]);
        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }

    private function validateJob()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'salary' => ['required', 'min:5']
        ]);
    }
}