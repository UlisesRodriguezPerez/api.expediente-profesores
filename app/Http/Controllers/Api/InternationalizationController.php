<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Internationalization;
use App\Http\Requests\StoreInternationalizationRequest;
use App\Http\Requests\UpdateInternationalizationRequest;

class InternationalizationController extends Controller
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
     * @param  \App\Http\Requests\StoreInternationalizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInternationalizationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internationalization  $internationalization
     * @return \Illuminate\Http\Response
     */
    public function show(Internationalization $internationalization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internationalization  $internationalization
     * @return \Illuminate\Http\Response
     */
    public function edit(Internationalization $internationalization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInternationalizationRequest  $request
     * @param  \App\Internationalization  $internationalization
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInternationalizationRequest $request, Internationalization $internationalization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internationalization  $internationalization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internationalization $internationalization)
    {
        //
    }
}
