<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorewaitinglistRequest;
use App\Http\Requests\UpdatewaitinglistRequest;
use App\Models\waitinglist;

class WaitinglistController extends Controller
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
     * @param  \App\Http\Requests\StorewaitinglistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewaitinglistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\waitinglist  $waitinglist
     * @return \Illuminate\Http\Response
     */
    public function show(waitinglist $waitinglist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\waitinglist  $waitinglist
     * @return \Illuminate\Http\Response
     */
    public function edit(waitinglist $waitinglist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewaitinglistRequest  $request
     * @param  \App\Models\waitinglist  $waitinglist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewaitinglistRequest $request, waitinglist $waitinglist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\waitinglist  $waitinglist
     * @return \Illuminate\Http\Response
     */
    public function destroy(waitinglist $waitinglist)
    {
        //
    }
}
