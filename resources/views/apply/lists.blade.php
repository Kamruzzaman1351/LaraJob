<x-layout>
  <a href="/users/jobs" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
  </a>
  <div class="my-10 text-center bg-gray-200 py-3">
    <h2 class="text-3xl">Application List for {{$job->title}}</h2>
  </div>
  <div class="overflow-x-auto relative px-3">
    <table class="table-auto w-full text-sm text-center text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-2 py-1">
            Applicant Name
          </th>
          <th scope="col" class="px-2 py-1">
            Email
          </th>
          <th scope="col" class="px-2 py-1">
            Hear About
          </th>
          <th scope="col" class="px-2 py-1">
            English Proficiency
          </th>
          <th scope="col" class="px-2 py-1">
            Good Fit
          </th>
          <th scope="col" class="px-2 py-1">
            Life Goal
          </th>
          <th scope="col" class="px-2 py-1">
            Ideal Job
          </th>
          <th scope="col" class="px-2 py-1">
            Hardest Thing
          </th>
          <th scope="col" class="px-2 py-1">
            Team Member
          </th>
          <th scope="col" class="px-2 py-1">
            Working
          </th>
          <th scope="col" class="px-2 py-1">
            Current Salary
          </th>
          <th scope="col" class="px-2 py-1">
            Expected Salary
          </th>
          <th scope="col" class="px-2 py-1">
            About
          </th>
          <th scope="col" class="px-2 py-1" >
            CV Download
          </th>
        </tr>
      </thead>
      @forelse ($applications as $application)
        <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row">
              {{ $application->name}}
            </th>
            <td class="px-2 py-1">
              {{ $application->email}}
            </td>
            <td class="px-2 py-1">
              {{$application->hear_about}}
            </td>
            <td class="px-2 py-1">
              {{$application->eng_profic}}
            </td>
            <td class="px-2 py-1">
              {{$application->good_fit}}
            </td>
            <td class="px-2 py-1">
              {{$application->life_goal}}
            </td>
            <td class="px-2 py-1">
              {{$application->ideal_job}}
            </td>
            <td class="px-2 py-1">
              {{$application->hardest_thing}}
            </td>
            <td class="px-2 py-1">
              {{$application->team_member}}
            </td>
            <td class="px-2 py-1">
              {{$application->working}}
            </td>
            <td class="px-2 py-1">
              {{$application->current_salary}}
            </td>
            <td class="px-2 py-1">
              {{$application->expected_salary}}
            </td>
            <td class="px-2 py-1">
              {{$application->about_you}}
            </td>
            <td class="px-2 py-1">
              <a href="/file-download/{{$application->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
            </td>
          </tr>         
        </tbody>
      
        @empty
          <tbody>
            <h2 class="text-center my-4 text-2xl">No Applications Yet</h2>
          </tbody>
      @endforelse
    </table>
  </div>

</x-layout>