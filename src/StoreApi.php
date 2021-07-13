<?php

namespace Go4tech\Moviex;
use Illuminate\Support\Facades\Http;
use Go4tech\Moviex\Models\Movies;

class StoreApi
{

    public function initialize()
    {
        $res = Http::withHeaders([
            'x-rapidapi-key' => config('moviex.api'),
            'x-rapidapi-host' => 'imdb8.p.rapidapi.com'
        ])->get('https://imdb8.p.rapidapi.com/title/get-top-rated-movies');

        $data = (object)json_decode($res);

        foreach ($data as $movie) {
            $new_id = [];
            preg_match('/tt(.*)\//', $movie->id, $new_id);
            
            $movie = Movies::firstOrCreate(
                ['api_id' =>  'tt'.$new_id[1]],
                ['chart_rating' => floatval($movie->chartRating)]
            );
        }
    }
    

    function apiRequest(String $api_id)
    {
        $res = Http::withHeaders([
            'x-rapidapi-key' => config('moviex.api'),
            'x-rapidapi-host' => 'imdb8.p.rapidapi.com'
        ])->get('https://imdb8.p.rapidapi.com/title/get-details',[
            'tconst' => $api_id
        ]);
        $data = (object)json_decode($res);
        return $data;
    }
}