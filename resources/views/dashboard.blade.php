<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="container" >
               <h1>  Hi!! {{ Auth::user()->name }}</h1>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="alert alert-secondary" role="alert">
                    <strong>"You're logged in!"</strong></div>
                </div>
                <table class="table">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">User Created</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user-> id}}</th>
      <td>{{$user -> name}}</td>
      <td>{{$user -> email}}</td>
      <td>{{ $user -> created_at->diffForHumans()}}</td>
    </tr>

    @endforeach
    
   
  </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>
