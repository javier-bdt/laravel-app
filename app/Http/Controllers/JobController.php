<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getJobs()
    {
        $jobs = Job::with('employer')->latest()->paginate(10);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function createJob()
    {
        return view('jobs.create');
    }

    public function showJob($id)
    {
        return view('jobs.show', [
            'job' => Job::find($id)
        ]);
    }
    public function storeJob(Request $request)
    {
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

    public function editJob($id)
    {
        $job = Job::find($id);
        if (!$job) {
            return abort(404, 'Job not found');
        }
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function updateJob(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'salary' => ['required']
        ]);

        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->title,
            'salary' => $request->salary,
        ]);
        return redirect('/jobs/' . $job->id);
    }

    public function deleteJob($id)
    {
        Job::destroy($id);
        return redirect('/jobs');
    }
}