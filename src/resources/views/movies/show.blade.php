@extends('moviex::layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
  <div class="bg-gray-700 p-4 mb-5">
    <a href="{{ url()->previous() }}" class="text-xl text-white hover:text-primary transition-colors duration-300 font-semibold p-2 uppercase inline-flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-7 mr-2">
        <path d="M0 0h24v24H0V0z" fill="none"/>
        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
      </svg>
      Back to movies
    </a>
  </div>
  <div class="flex flex-col md:flex-row flex-wrap bg-gray-700 border-gray-600">
    <div class="flex flex-row justify-center w-full md:w-1/3">
      <img src="{{ $movie->image }}" alt="$movie->title" class="w-full object-cover">
    </div>
    <div class="flex flex-col justify-start p-4 w-2/3">
      <h1 class="text-4xl text-white font-semibold mb-8">{{ $movie->title }}</h1>
      <ul class="space-y-2">
        <li class="inline-flex w-full text-gray-200 font-semibold text-xl">
          <div class="w-1/2 md:w-2/6 lg:w-1/6">Duration:</div>
          <div>{{ $movie->duration }}</div>
        </li>
        <li class="inline-flex w-full text-gray-200 font-semibold text-xl">
          <div class="w-1/2 md:w-2/6 lg:w-1/6">Year:</div>
          <div>{{ $movie->year }}</div>
        </li>
        <li class="inline-flex w-full text-gray-200 font-semibold text-xl">
          <div class="w-1/2 md:w-2/6 lg:w-1/6">Rating:</div>
          <div>{{ $movie->chart_rating }}</div>
        </li>
        <li class="inline-flex w-full text-gray-200 font-semibold text-xl">
          <div class="w-1/2 md:w-2/6 lg:w-1/6">Duration:</div>
          <div>{{ $movie->duration }}</div>
        </li>
      </ul>
    </div>
  </div>
</div>
  
@endsection