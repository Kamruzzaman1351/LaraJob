<x-layout>
  @include('layouts.hero_section')
  @include('layouts.search')
  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @forelse ( $jobs as $job )
      <x-job-card :job="$job" />        
    @empty
      <p>{{ trans('No jobs found.') }}</p>      
    @endforelse
  </div>
  <div class="mx-auto mt-10 px-4 mb-5">
    {{ $jobs->links() }}
  </div>
</x-layout>