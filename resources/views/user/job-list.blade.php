<x-layout>
  <h2 class="mt-4 text-center text-3xl mb-4 py-3"> List of your Posted Jobs</h2>
  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless (count($jobs) == 0)
      @foreach ($jobs as $job)
          <x-job-card :job="$job" />
      @endforeach
      @else
      <x-card class="align-center">      
        <div class="text-center">
          <h2 class="text-center text-2xl mb-4">You have no Job Yet!</h2> 
          <a href="/jobs/create"
            class="px-3 py-2 bg-red-400 text-white text-crenter my-3 rounded-sm"
          >
            Create Job
          </a> 
        </div>    
      </x-card>
    @endunless
  </div>
</x-layout>