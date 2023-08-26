<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFeesRequest;
use App\Http\Requests\UpdateFeesRequest;


class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        $Fees_input = Fees::all();
        return response()->json($Fees_input, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeesRequest $request)
    {
        $Fees_input = new Fees();

        $Fees_input->fees_name=$request->classname;
        $Fees_input->class_types=$request->classtype;
        $Fees_input->fees_types=$request->feestype;
        $Fees_input->year_types=$request->yeartype;
        $Fees_input->to_year=$request->toyear;
        $Fees_input->from_year=$request->fromyear;
        $Fees_input->extra_types=$request->extratypes;
        $Fees_input->charges=$request->charges;
        $Fees_input->remark=$request->remark;


        $Fees_input->save();
        return response()->json($Fees_input, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function show(Fees $fees)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function edit(Fees $fees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeesRequest  $request
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeesRequest $request, Fees $fees)
    {

        $fees->fees_types=$request->feestype;
        $fees->class_types=$request->classtype;
        $fees->year_types=$request->yeartype;
        $fees->to_year=$request->toyear;
        $fees->from_year=$request->fromyear;
        $fees->extra_types=$request->extratypes;
        $fees->charges=$request->charges;
        $fees->remark=$request->remark;
        $fees->update();
        return response()->json($fees, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fees $fees)
    {

        $fees->delete();
        return response()->json($fees, 200);
    }

    public function deleteFee($id)
    {

        //    return $id;
        $fees = Fees::find($id);
        $fees->delete();
        return response()->json($fees, 200);
    }

    public function updateFee($id,Request $request)
    {

        //    return $id;

        $fees = Fees::find($id);

        $fees->class_types=$request->classtype;
        $fees->fees_types=$request->feestype;
        $fees->year_types=$request->yeartype;
        $fees->to_year=$request->toyear;
        $fees->from_year=$request->fromyear;
        $fees->extra_types=$request->extratypes;
        $fees->charges=$request->charges;
        $fees->remark=$request->remark;
        $fees->update();
        return response()->json($fees, 200);
    }
}
