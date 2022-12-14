@props(['tags'])

@php
    $tagArr = explode(',', $tags);
@endphp


<ul class="flex">
  @forelse ($tagArr as $tag)
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
      <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li> 
    @empty     
  @endforelse
</ul>