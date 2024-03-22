@extends('layouts')
@section('content')
<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Welcome</h1>
      <p class="mb-8 leading-relaxed">Log Your Game Dev Tycoon Progress</p>
      <div class="flex justify-center">
        <a href="{{ route('filament.admin.auth.login') }}" class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg"
        >Login</a>
        <a href="{{ url('register') }}" class="ml-4 inline-flex text-gray-400 bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 hover:text-white rounded text-lg"
        >Register</a>
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <img class="object-cover object-center rounded" alt="hero" src="{{ asset('screenshot.jpeg') }}">
    </div>
  </div>
</section>
@endsection