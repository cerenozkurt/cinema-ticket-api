<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\MovieStoreRequest;
use App\Http\Requests\Movie\MovieUpdateRequest;
use App\Http\Resources\MovieResource;
use App\Models\Cast;
use App\Models\Movie;
use App\Models\MovieCasts;
use App\Models\MovieGenres;
use App\Repository\MovieRepositoryInterface;
use App\Traits\MediaTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    use ResponseTrait;
    use MediaTrait;

    public $movieRepository;
    public $movieCastRepository;
    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = $this->movieRepository->all();

        if (empty($movies)) {
            return $this->responseData(MovieResource::collection($movies));
        }
        return $this->responseDataNotFound('movies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieStoreRequest $request)
    {
        $datas = [
            'title' => $request->title,
            'description' => $request->description,
            'duration_min' => $request->duration_min,
            'director_id' => $request->director_id,
            'language_id' => $request->language_id,
            'trailer_url' => $request->trailer_url,
            'movie_warnings' => json_encode($request->movie_warnings)
        ];

        $movie = $this->movieRepository->create($datas);
        if ($request->has('casts')) {
            foreach (($request->casts) as $cast_id) {
                $movie->casts()->attach($cast_id);
            }
        }

        if ($request->has('movie_genres')) {
            foreach (($request->movie_genres) as $genre_id) {
                $movie->genres()->attach($genre_id);
            }
        }

        if ($movie) {

            return $this->responseData(new MovieResource($movie));
        }
        return $this->responseError();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = $this->movieRepository->findById($id);
        if ($movie) {
            return $this->responseData(new MovieResource($movie));
        }
        return $this->responseDataNotFound('movie');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieUpdateRequest $request, $id)
    {
        $movie = $this->movieRepository->findById($id);


        //silmeyi de ekle
        if ($request->has('casts')) {
            foreach ($movie->casts as $cast) {

                $movie->casts()->detach($cast);
                $movie->save();
            }
            foreach (($request->casts) as $cast_id) {
                $cast = Cast::find($cast_id);
                if ($cast) {
                    $movie->casts()->attach($cast);
                    $movie->save();
                } else {
                    return $this->responseDataNotFound('cast');
                }
            }
        }

        if ($request->has('movie_genres')) {
            foreach ($movie->genres as $genre_id) {
                $movie->genres()->detach($genre_id);
                $movie->save();
            }
            foreach (($request->movie_genres) as $genre_id) {
                $genre = MovieGenres::find($genre_id);
                if ($genre) {
                    $movie->genres()->attach($genre_id);
                    $movie->save();
                } else {
                    return $this->responseDataNotFound('genre');
                }
            }
        }

        if ($movie) {
            $this->movieRepository->update($id, $request->all());
            $movie = $this->movieRepository->findById($id);
            return $this->responseData(new MovieResource($movie));
        }

        return $this->responseDataNotFound('movie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $movie = $this->movieRepository->findById($id);
        if ($movie) {
            $this->movieRepository->deleteById($id);
            return $this->responseSuccess('delete successfully');
        }
        return $this->responseDataNotFound('movie');
    }
}
