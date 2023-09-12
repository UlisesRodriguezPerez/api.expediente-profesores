<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TecCategory;
use App\Http\Requests\StoreTecCategoryRequest;
use App\Http\Requests\UpdateTecCategoryRequest;

class TecCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreTecCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTecCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TecCategory  $tecCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TecCategory $tecCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TecCategory  $tecCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TecCategory $tecCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTecCategoryRequest  $request
     * @param  \App\TecCategory  $tecCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTecCategoryRequest $request, TecCategory $tecCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TecCategory  $tecCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TecCategory $tecCategory)
    {
        //
    }
}
