<nav class="flex justify-between items-center mb-4 mx-10 py-3 border-bottom">
  <a href="/">
    <h1 class="text-4xl text-red-500">LJ</h1>
  </a>
  
  <ul class="flex space-x-6 mr-6 text-lg">
    @auth
      <li>
        Welcome 
        <span class="font-bold uppercase">
          {{auth()->user()->name}}
        </span>
      </li>
      <li>
        <a href="/jobs/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage Jobs</a>
      </li>
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-door-closed"></i> Logout
          </button>
        </form>
      </li>
      @else
      <li>
          <a href="/register" class="hover:text-laravel">
            <i class="fa-solid fa-user-plus"></i> Register
          </a>
      </li>
      <li>
          <a href="/login" class="hover:text-laravel">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
            </a
          >
      </li>
    @endauth
  </ul>
</nav>