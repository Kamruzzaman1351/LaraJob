@props(['job'])

<x-card>
  <a href="/jobs/{{$job->id}}">
    <div class="flex">
      <img
          class="hidden w-48 mr-6 md:block"
          src="{{$job->logo ? asset('storage/images/' . $job->logo) : ''}}"
          alt=""
      />
      <div>
        <h3 class="text-2xl">
            <a href="/jobs/{{$job->id}}">{{$job->title}}</a>
        </h3>
        <div class="text-xl font-bold mb-4">{{$job->company}}</div>
          <x-tag-list :tags="$job->tags"/>
          <div class="text-lg mt-4">
              <i class="fa-solid fa-location-dot"></i> 
              {{ $job->location}}
          </div>
          @guest
            <a
              href="/apply/{{$job->id}}"
              class="text-center mt-4 block bg-green-500 text-white py-2 rounded-xl hover:opacity-80">
              <i class="fa-solid fa-check"></i> 
              Apply Now
            </a>                  
          @endguest
          @auth
            @if (auth()->user()->id != $job->user_id)
              <a
                href="/apply/{{$job->id}}"
                class="text-center mt-4 block bg-green-500 text-white py-2 rounded-xl hover:opacity-80">
                <i class="fa-solid fa-check"></i> 
                Apply Now
              </a>                    
            @endif                  
          @endauth
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
          @if (Route::current()->getName() === 'users.jobs')
            <div class="mt-4 text-center bg-green-400 text-white py-2 text-2xl rounded">
              <a href="/apply/{{$job->id}}/applications">Application Lists</a>
            </div>
          @endif         
          
      </div>
    </div>
  </a>
</x-card>