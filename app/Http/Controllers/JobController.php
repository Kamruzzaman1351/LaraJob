<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Requests\Job\StoreJobRequest;

class JobController extends Controller
{
    public function index(Request $request) {
        $jobs = Job::latest()->filter(request(['search', 'tag']))->get();
        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function store(StoreJobRequest $request) {
        $formData = $request->validated();

        Job::create($formData);
        return redirect("/")->with('message', 'Job created successfully');
    }
}
