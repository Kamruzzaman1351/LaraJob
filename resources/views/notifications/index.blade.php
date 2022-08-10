<x-layout>  
  @forelse ($notifications as $notification)
    <x-card class="bg-green-500 text-white max-w-lg mx-auto mt-24">
      <p>At {{$notification->created_at}}</p>
      <h2 class="mt-3 text-center text-2xl">{{$notification->data['name']}} apply for {{$notification->data['job_title']}}</h2>
      @if($loop->last)
          <a href="#" id="mark-all">
              Mark all as read
          </a>
      @endif
    </x-card>
  @empty
  <x-card class="max-w-lg mx-auto mt-24">
    <h2 class="text-center text-2xl">No Notification</h2>    
  </x-card>
  @endforelse
  
</x-layout>