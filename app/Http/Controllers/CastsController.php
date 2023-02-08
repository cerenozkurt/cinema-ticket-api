<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCastsRequest;
use App\Http\Requests\UpdateCastsRequest;
use App\Models\Casts;

class CastsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCastsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCastsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Casts  $casts
     * @return \Illuminate\Http\Response
     */
    public function show(Casts $casts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Casts  $casts
     * @return \Illuminate\Http\Response
     */
    public function edit(Casts $casts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCastsRequest  $request
     * @param  \App\Models\Casts  $casts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCastsRequest $request, Casts $casts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Casts  $casts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casts $casts)
    {
        //
    }
}
