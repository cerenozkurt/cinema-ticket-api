<?php

namespace App\Http\Controllers;

use App\Http\Requests\Director\DirectorStoreRequest;
use App\Http\Requests\Director\DirectorUpdateRequest;
use App\Http\Resources\DirectorResource;
use App\Http\Resources\MovieResource;
use App\Repository\DirectorRepositoryInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    use ResponseTrait;

    public $directorRepository;
    public function __construct(DirectorRepositoryInterface $directorRepository)
    {
        $this->directorRepository = $directorRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = $this->directorRepository->all();

        if (!empty($directors)) {
            return $this->responseData(DirectorResource::collection($directors));
        }
        return $this->responseDataNotFound('directors');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectorStoreRequest $request)
    {

        $director = $this->directorRepository->create($request->all());
        if ($director) {
            return $this->responseData(new DirectorResource($director));
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
        $director = $this->directorRepository->findById($id);
        if ($director) {
            $director->movie  = MovieResource::collection($director->movies);
            return $this->responseData(new DirectorResource($director));
        }
        return $this->responseDataNotFound('director');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DirectorUpdateRequest $request, $id)
    {
        $director = $this->directorRepository->findById($id);
        if ($director) {
            $this->directorRepository->update($id, $request->all());
            $director = $this->directorRepository->findById($id);
            return $this->responseData(new DirectorResource($director));
        }
        return $this->responseDataNotFound('director');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director = $this->directorRepository->findById($id);
        if ($director) {
            $this->directorRepository->deleteById($id);
            return $this->responseSuccess('delete successfully');
        }
        return $this->responseDataNotFound('director');
    }
}
