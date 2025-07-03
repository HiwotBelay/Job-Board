<?php

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function store(Request $request, $jobId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        JobApplication::create([
            'job_id' => $jobId,
            'name' => $request->name,
            'email' => $request->email,
            'cv_path' => $cvPath,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}

