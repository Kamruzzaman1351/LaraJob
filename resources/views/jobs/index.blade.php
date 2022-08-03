<x-layout>
  @include('layouts.hero_section')
  @include('layouts.search')
  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless ($jobs->count() == 0) 
      @foreach ($jobs as $job)
        <x-job-card :job="$job" />
      @endforeach
      @else
      <p>{{ trans('No jobs found.') }}</p>
    @endunless
  </div>
</x-layout>