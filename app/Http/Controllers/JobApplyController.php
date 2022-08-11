<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\ApplyJob;
use App\lib\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApplyNotification;
use App\Http\Requests\Apply\StoreApplyJobRequest;

class JobApplyController extends Controller
{
    public function apply(Job $job) {
        abort_if($job->user_id == auth()->user()->id, 403, 'You are not allowed to apply this job');
        return view('apply.index', ['job' => $job]);
    }

    public function applyJob(StoreApplyJobRequest $request, Job $job) {
        $formData = $request->validated();
        if($request->hasFile('file_cv')) {
            $fileName = (new FileUploader)->fileName($request->file('file_cv'));
            $path = $request->file('file_cv')->storeAs('public/apply/cv', $fileName);
            $formData['file_cv'] = $fileName;
        }
        $formData['job_id'] = $job->id;
        $apply = new ApplyJob();
        $apply->forceFill($formData);
        $apply->save();
        $user = User::find($job->user_id);
        $info = [
            'name' => $apply->name,
            'job_title' => $job->title,
        ];
        Notification::send($user, new ApplyNotification($info));
        return redirect("/jobs/$job->id")->with('message', "Application Complete");

    }

    public function applications(Job $job) {
        $applications = ApplyJob::where('job_id', $job->id)->get();
        // dd($applications);
        return view('apply.lists', ['applications' => $applications, 'job' => $job]);
    }

    public function fileDownload(ApplyJob $apply) {
        $file_path = public_path("storage/apply/cv/$apply->file_cv");
        $file_name = time().'.pdf';
        $headers = ['Content-Type: application/pdf'];
        return response()->download($file_path, $file_name, $headers);
      }
}
