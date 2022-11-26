<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepositionRequest;
use App\Http\Requests\UpdatepositionRequest;
use App\Models\position;

class PositionController extends Controller
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
    public function storeposition(Request $req)
    {
        $data=new Position();
        $data->position=$req->position;
        $data->amount=$req->amount;
        $data->save();
        return response()->json('Success', 200);
    }
    public function updateposition($id,Request $req)
    {
        $data=Position::find($id);
        $data->position=$req->position;
        $data->amount=$req->amount;
        $data->update();
        return response()->json('Success', 200);
    }
    public function DeletePosition($id)
    {
        $data=Position::find($id);
        $data->delete();

        return response()->json('Success', 200);
    }
    public function showposition()
    {
        $data=Position::get();
        return response()->json($data, 200);
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
     * @param  \App\Http\Requests\StorepositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepositionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepositionRequest  $request
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepositionRequest $request, position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(position $position)
    {
        //
    }
}
