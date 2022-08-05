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
      </div>
    </div>
  </a>
</x-card>