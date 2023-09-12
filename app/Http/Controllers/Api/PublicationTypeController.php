<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PublicationType;
use App\Http\Requests\StorePublicationTypeRequest;
use App\Http\Requests\UpdatePublicationTypeRequest;

class PublicationTypeController extends Controller
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
     * @param  \App\Http\Requests\StorePublicationTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicationTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PublicationType  $publicationType
     * @return \Illuminate\Http\Response
     */
    public function show(PublicationType $publicationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PublicationType  $publicationType
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicationType $publicationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicationTypeRequest  $request
     * @param  \App\PublicationType  $publicationType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublicationTypeRequest $request, PublicationType $publicationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PublicationType  $publicationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicationType $publicationType)
    {
        //
    }
}
