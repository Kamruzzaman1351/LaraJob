<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use Illuminate\Validation\ValidationException;
use App\lib\FileUploader;
class JobController extends Controller
{
    public $fileUploader;
    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }
    public function index(Request $request) {
        $jobs = Job::latest()->filter(request(['search', 'tag']))->paginate(10);
        // dd($jobs);
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
            $fileName = $this->fileUploader->fileName($request->file('logo'));
            $path = $request->file('logo')->storeAs('public/images', $fileName);
            $formData['logo'] = $fileName;
            // dd($path);
        }
        $formData['user_id'] = auth()->id();
        // dd($formData);
        $job = new Job;
        $job->forceFill($formData);
        $job->save();
        return redirect("/")->with('message', 'Job created successfully');
    }

    public function edit(Job $job) {
        abort_if($job->user_id != auth()->user()->id, 403, 'You do not have permission to edit this job');
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(UpdateJobRequest $request, Job $job) {
        $formData = $request->validated();
        if($request->hasFile('logo')) {
            $fileName = $this->fileUploader->fileName($request->file('logo'));
            $path = $request->file('logo')->storeAs('public/images', $fileName);
            $formData['logo'] = $fileName;
        }

        abort_if($job->user_id != auth()->user()->id, 403, 'You do not have permission to Edit');
        // $job->update($formData);
        $job->forceFill($formData);
        if(!$job->isDirty()) {
            $error = ValidationException::withMessages([
                "You did not change anything"
            ]);
            throw $error;
        };
        $job->save();
        return redirect("/jobs/$job->id")->with('message', 'Job updated successfully');
    }

    public function delete(Job $job) {
        if($job->user_id != auth()->id()) {
            abort(403, 'You do not have permission to Delete');
        }
        $job->delete();
        return redirect('/')->with('message', 'Job Deleted Successfully');
    }

    public function userJobs() {
        // $jobs = Job::where('user_id', auth()->user()->id)->get();
        $jobs = Job::whereBelongsTo(auth()->user())->paginate(5);
        return view('user.job-list', ['jobs' => $jobs]);
            
    }

}
