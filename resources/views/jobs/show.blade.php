<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
  </a>
  <div class="mx-4">
    <x-card class="p-10">
      <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div class="flex flex-col items-center justify-center text-center">
          <img
            class="w-48 mr-6 mb-6"
            src="{{$job->logo ? asset('storage/images/' . $job->logo) : ''}}"
            alt=""
          />

          <h3 class="text-2xl mb-2">{{$job->title}}</h3>
          <div class="text-xl font-bold mb-4">{{$job->company}}</div>
            <x-tag-list :tags="$job->tags" />
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$job->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
              <h3 class="text-3xl font-bold mb-4">
                  Job Description
              </h3>
              <div class="text-lg space-y-6">
                <p>
                  {{ $job->description}}
                </p>

                <a target="_blank"
                  href="mailto:{{$job->email}}"
                  class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                  <i class="fa-solid fa-envelope"></i>
                  Contact Employer
                </a>

                <a
                  href="{{$job->website}}"
                  target="_blank"
                  class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                  <i class="fa-solid fa-globe"></i> 
                  Visit Website
                </a>

                @if (auth()->user()->id != $job->user_id)
                  <a
                    href="/apply/{{$job->id}}"
                    class="block bg-green-500 text-white py-2 rounded-xl hover:opacity-80">
                    <i class="fa-solid fa-check"></i> 
                    Apply Now
                  </a>                    
                @endif
              </div>
            </div>
        </div>
      </div>
      @if ($job->user_id == auth()->id())
        <x-card class="mt-4 p-2 flex space-x-6">
          <a href="/jobs/{{$job->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
          </a>
          <form method="POST" action="/jobs/{{$job->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
          </form>
        </x-card>          
      @endif
    </x-card>
  </div>
</x-layout>