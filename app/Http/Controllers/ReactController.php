<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorereactRequest;
use App\Http\Requests\UpdatereactRequest;
use App\Models\react;

class ReactController extends Controller
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
     * @param  \App\Http\Requests\StorereactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorereactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\react  $react
     * @return \Illuminate\Http\Response
     */
    public function show(react $react)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\react  $react
     * @return \Illuminate\Http\Response
     */
    public function edit(react $react)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereactRequest  $request
     * @param  \App\Models\react  $react
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereactRequest $request, react $react)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\react  $react
     * @return \Illuminate\Http\Response
     */
    public function destroy(react $react)
    {
        //
    }
}
