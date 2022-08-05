<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use Illuminate\Validation\ValidationException;
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
        if($request->hasFile('logo')) {
            $fileName = $this->fileName($request->file('logo'));
            $path = $request->file('logo')->storeAs('public/images', $fileName);
            $formData['logo'] = $fileName;
            // dd($path);
        }
        // dd($formData);
        Job::create($formData);
        return redirect("/")->with('message', 'Job created successfully');
    }

    public function edit($id) {
        $job = Job::findOrFail($id);
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(UpdateJobRequest $request, $id) {
        $formData = $request->validated();
        if($request->hasFile('logo')) {
            $fileName = $this->fileName($request->file('logo'));
            $path = $request->file('logo')->storeAs('public/images', $fileName);
            $formData['logo'] = $fileName;
        }
        $job = Job::findOrFail($id);
        // Problem to Fix
        // if(!$job->isDirty(['title', 'company', 'location', 'website', 'email', 'description', 'tags'])) {
        //     $error = ValidationException::withMessages([
        //         "You did not change anything"
        //     ]);
        //     throw $error; 
            
        // }
        $job->update($formData);
        return redirect("/jobs/$id")->with('message', 'Job updated successfully');
    }

    public function delete(Job $job) {
        $job->delete();
        return redirect('/')->with('message', 'Job Deleted Successfully');
    }

    public function fileName ($file) {
        $fileName = $file->getClientOriginalName();
        $fileN = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExtention = $file->getClientOriginalExtension();
        $fileNameToStore = $fileN . '_' . time(). '.' . $fileExtention;
        return $fileNameToStore;
    }
}
