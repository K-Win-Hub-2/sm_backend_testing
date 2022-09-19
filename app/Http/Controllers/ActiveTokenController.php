<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeactive_tokenRequest;
use App\Http\Requests\Updateactive_tokenRequest;
use App\Models\active_token;

class ActiveTokenController extends Controller
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
     * @param  \App\Http\Requests\Storeactive_tokenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeactive_tokenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\active_token  $active_token
     * @return \Illuminate\Http\Response
     */
    public function show(active_token $active_token)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\active_token  $active_token
     * @return \Illuminate\Http\Response
     */
    public function edit(active_token $active_token)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateactive_tokenRequest  $request
     * @param  \App\Models\active_token  $active_token
     * @return \Illuminate\Http\Response
     */
    public function update(Updateactive_tokenRequest $request, active_token $active_token)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\active_token  $active_token
     * @return \Illuminate\Http\Response
     */
    public function destroy(active_token $active_token)
    {
        //
    }
}
