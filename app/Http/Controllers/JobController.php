<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Show all jobs
   public function index()
{
    $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
    return view('welcome', compact('jobs'));
}


    // Show form to create a new job
    public function create()
    {
        return view('jobs.create');
    }

    // Save new job
   public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    \App\Models\Job::create([
        'title' => $request->title,
        'company' => $request->company,
        'location' => $request->location,
        'description' => $request->description,
    ]);

    return redirect()->route('jobs.index')->with('success', 'Job posted successfully!');
}



    // Show form to edit a job
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    // Update a job
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'salary' => 'nullable|numeric',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    // Delete a job
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
  public function show(Job $job)
{
    return view('jobs.show', compact('job'));
}


}
