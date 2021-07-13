@extends('moviex::layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
  <h1 class="title-base text-gray-700 text-center">
    Top Rated Movies
  </h1>
  <p class="p-base mb-16 text-center text-gray-500 dark:text-gray-200">
    The top 250 as rated by IMDb Users
  </p>
  <div class="mt-14 p-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
      @forelse ($movies as $movie)
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <img src="{{ $movie->image }}" alt="$movie->title" class="w-full object-cover">
            <div class="flip-card-inner-3d-front">
              <h3 class="front-title">
                {{ $movie->title }}
              </h3>
            </div>
          </div>
          <div class="flip-card-back">
            <div class="flip-card-inner-3d-back flex flex-col justify-center items-center space-y-3">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-32 fill-current text-primary">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M12 7.13l.97 2.29.47 1.11 1.2.1 2.47.21-1.88 1.63-.91.79.27 1.18.56 2.41-2.12-1.28-1.03-.64-1.03.62-2.12 1.28.56-2.41.27-1.18-.91-.79-1.88-1.63 2.47-.21 1.2-.1.47-1.11.97-2.27M12 2L9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2z"/>
              </svg>
              <p class="text-4xl font-bold px-3 text-center text-white pb-10">
                {{ $movie->chart_rating }}
              </p>
              <a href="/movie/{{ $movie->api_id }}" class="text-white bg-primary transform origin-center hover:scale-105 transition-all duration-300 font-bold p-4 uppercase text-3xl">Show Details</a>
            </div>
          </div>
        </div>
      </div>
      @empty
        <p> 'No movies yet' </p>
      @endforelse
    </div>
    {{ $movies->links() }}
  </div>
</div>
@endsection