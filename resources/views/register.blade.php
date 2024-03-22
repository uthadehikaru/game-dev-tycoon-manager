@extends('layouts')
@section('content')
<section class="text-gray-400 bg-gray-900 body-font relative">
    <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
        <div
            class="lg:w-2/3 md:w-1/2 bg-gray-900 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            <img class="object-cover object-center rounded" alt="hero"
                src="{{ asset('screenshot.jpeg') }}">
        </div>
        <form  method="post" action="{{ url('register') }}"
        class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
            @csrf
            <h2 class="text-white text-lg mb-1 font-medium title-font">Register</h2>
            <p class="leading-relaxed mb-5">get your account right now</p>
            <div class="relative mb-4">
                <label for="name" class="leading-7 text-sm text-gray-400">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-400">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-400">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="password_confirmation" class="leading-7 text-sm text-gray-400">Password Confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button type="submit"
                class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg"
                >Register</button>
            <p class="text-xs text-gray-400 text-opacity-90 mt-3">*by register, you are agree with our term and conditions</p>
        </form>
    </div>
</section>
@endsection
