<?php

namespace Go4tech\Moviex\Http\Controllers;

use Illuminate\Http\Request;
use Go4tech\Moviex\Models\Movies;
use Illuminate\Support\Facades\Http;
use Go4tech\Moviex\StoreApi;
use Go4tech\Moviex\TestClass;

class MoviesController extends Controller
{
    public function index()
    {

        $movies = Movies::orderBy('chart_rating', 'desc')->paginate(6);

        foreach ($movies as $movie) {
            if (!$movie->title) {
                $apiCall = new StoreApi();
                $data = $apiCall->apiRequest($movie->api_id);
    
                $movie->update([
                    'image' => $data->image->url,
                    'title' => $data->title,
                    'duration' => $data->runningTimeInMinutes,
                    'year' => $data->year
                ]);
            }
        }

        return view('moviex::movies.index', compact('movies'));

    }

    public function show()
    {
        $movie = Movies::where('api_id', request('id'))->first();

        if (!$movie->title) {
            $apiCall = new StoreApi();
            $data = $apiCall->apiRequest(request('id'));

            $movie->update([
                'image' => $data->image->url,
                'title' => $data->title,
                'duration' => $data->runningTimeInMinutes,
                'year' => $data->year
            ]);
        }
    
        return view('moviex::movies.show', compact('movie'));
    }

}
