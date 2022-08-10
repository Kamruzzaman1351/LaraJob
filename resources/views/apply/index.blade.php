<x-layout>
  <div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-2xl mx-auto mt-20">
      <header>
        <h2 class="text-2xl font-bold uppercase mb-1">
            Apply {{$job->title}}
        </h2>
        <p class="mb-4">{{$job->description}}</p>
      </header>

      <form action="/apply" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">
            What is your name?
          </label>
          <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"
            value="{{ auth()->user()->name }}"
          />
          @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" class="inline-block text-lg mb-2">
            What is your Email?
          </label>
          <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
            value="{{auth()->user()->email}}"
          />
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="hear_about" class="inline-block text-lg mb-2">
            Where did you hear about the position?
          </label>
          <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="hear_about"
            placeholder="Example: Social, LinkedIn, Facebook, etc"
            value="{{old('hear_about')}}"
          />
          @error('hear_about')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="inline-block text-lg mb-2" for="eng_profic">
            Please indicate a level of proficiency in English
          </label>
          <div class="relative">
            <select 
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              name="eng_profic"
            >
              <option @selected(old('eng_profic')) selected disabled>=== Select English Proficiency ===</option>
              <option @selected(old('eng_profic'))>Fluent</option>
              <option @selected(old('eng_profic'))>Native</option>
              <option @selected(old('eng_profic'))>Proficient</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
          @error('eng_profic')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="good_fit" class="inline-block text-lg mb-2">
            Why do you feel you're a good fit for this position?
          </label>
          <textarea
            class="border border-gray-200 p-2 rounded w-full"
            name="good_fit"
            rows="3"
            placeholder="I am good fit for this position because...">
            {{old('good_fit')}}
          </textarea>
          @error('good_fit')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="life_goal" class="inline-block text-lg mb-2">
            What is something you'd like to improve your goal? 
          </label>
          <textarea
            class="border border-gray-200 p-2 rounded w-full"
            name="life_goal"
            rows="3"
            placeholder="Share what you are doing to improve and if there's a timeline or measurable goal">
            {{old('life_goal')}}
          </textarea>
          @error('life_goal')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="ideal_job" class="inline-block text-lg mb-2">
            What is an ideal job description/role for you? What would you include and exclude? 
          </label>
          <textarea
            class="border border-gray-200 p-2 rounded w-full"
            name="ideal_job"
            rows="3"
            placeholder="i.e. include things you would love to do; exclude what you do not like to do">
            {{old('ideal_job')}}
          </textarea>
          @error('ideal_job')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="hardest_thing" class="inline-block text-lg mb-2">
            What is the hardest thing you've ever done?
          </label>
          <textarea
            class="border border-gray-200 p-2 rounded w-full"
            name="hardest_thing"
            rows="3"
            placeholder="i.e. It could be personal or professional.">
            {{old('hardest_thing')}}
          </textarea>
          @error('hardest_thing')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>        
        <div class="mb-6">
          <label for="team_member" class="inline-block text-lg mb-2">
            What is the largest team you've worked with? Were any of your colleagues based remotely?
          </label>
          <textarea
            class="border border-gray-200 p-2 rounded w-full"
            name="team_member"
            rows="3"
            placeholder="">
            {{old('team_member')}}
          </textarea>
          @error('team_member')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="working" class="inline-block text-lg mb-2">
            Are you currently working?
          </label>
          <div class="flex px-4">
            <div class="form-check form-check-inline mx-4">
              <input 
                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" 
                name="working" value="Yes"
                @checked(old('working'))>
              <label class="form-check-label inline-block text-gray-800" for="working">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input 
                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="radio" 
                name="working" 
                value="No"
                @checked(old('working'))>
              <label class="form-check-label inline-block text-gray-800" for="working">No</label>
            </div>
          </div>
          @error('working')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="current_salary" class="inline-block text-lg mb-2">
            What is your current/last drawn, MONTHLY salary? Please include currency
          </label>
          <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="current_salary"
            placeholder="Example: $3000"
            value="{{old('current_salary')}}"
          />
          @error('current_salary')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="expected_salary" class="inline-block text-lg mb-2">
            What is your expected monthly salary?
          </label>
          <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="expected_salary"
            placeholder="Example: $3000"
            value="{{old('expected_salary')}}"
          />
          @error('expected_salary')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="file_cv" class="inline-block text-lg mb-2">
            Upload Your Updated CV
          </label>
          <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="file_cv"
          />
          @error('file_cv')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="about_you" class="inline-block text-lg mb-2">
            Tell Us About yourself
          </label>
          <textarea
            class="border border-gray-200 rounded p-2 w-full"
            name="about_you"
            rows="3"
            placeholder="Include tasks, requirements, salary, etc">
            {{old('about_you')}}
          </textarea>
          @error('about_you')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Apply Now
          </button>

          <a href="/" class="text-black ml-4"> Back </a>
        </div>
        
      </form>
    </div>
  </div>
</x-layout>