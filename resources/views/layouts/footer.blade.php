<footer
  class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
  <p class="ml-2">
    Copyright &copy; 2022, All Rights reserved
  </p>
  
  @if (URL::current() !== 'http://127.0.0.1:8000/jobs/create')
    <a href="/jobs/create"
      class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">
      Post Job
    </a>      
  @endif
</footer>