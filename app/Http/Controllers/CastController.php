<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cast\CastStoreRequest;
use App\Http\Requests\Cast\CastUpdateRequest;
use App\Http\Requests\MediaRequest;
use App\Http\Resources\CastResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\MovieResource;
use App\Models\Cast;
use App\Repository\CastRepositoryInterface;
use App\Traits\MediaTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v2;

class CastController extends Controller
{
    use ResponseTrait;
    use MediaTrait;

    public $castRepository;
    public function __construct(CastRepositoryInterface $castRepository)
    {
        $this->castRepository = $castRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casts = $this->castRepository->all();
        if (!empty($casts)) {
            return $this->responseData(CastResource::collection($casts));
        }
        return $this->responseDataNotFound('casts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CastStoreRequest $request)
    {
        

        $cast = $this->castRepository->create($request->all());
        if ($cast) {
            return $this->responseData(new CastResource($cast));
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
        $cast = $this->castRepository->findById($id);
        if ($cast) {
            $cast->movie  = MovieResource::collection($cast->movies);
            return $this->responseData(new CastResource($cast));

        }
        return $this->responseDataNotFound('cast');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CastUpdateRequest $request, $id)
    {
        $cast = $this->castRepository->findById($id);
        if ($cast) {
            $this->castRepository->update($id, $request->all());
            $cast = $this->castRepository->findById($id);
            return $this->responseData(new CastResource($cast));
        }
        return $this->responseDataNotFound('cast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cast = $this->castRepository->findById($id);
        if ($cast) {
            $this->castRepository->deleteById($id);
            return $this->responseSuccess('delete successfully');
        }
        return $this->responseDataNotFound('cast');
    }

    

    // public function upload_image($cast, MediaRequest $request)
    // {
    //     $cast = Cast::find($cast);
    //     if ($cast) {
    //         $image = $this->upload_media($request->image, $cast, 'cast');

    //         $datas = ['media_id' => $image->id];
    //         $this->castRepository->update($cast->id, $datas);

    //         if ($image) {
    //             return $this->responseData(new MediaResource($image));
    //         }
    //         return $this->responseError();
    //     }
    //     return $this->responseDataNotFound('cast');
    // }

    // public function delete_image($cast_id)
    // {
    //     $cast = Cast::find($cast_id);
    //     if ($cast) {
    //         $image = $this->delete_media($cast,'cast');
    //         return $image;

    //         if ($image) {
    //             return $this->responseSuccess('image delete successfully');
    //         }
    //         return $this->responseError();
    //     }
    //     return $this->responseDataNotFound('cast');
    // }
}
