<?php

namespace App\Http\Controllers;

use File;
use App\Mail\ThankYou;

use App\Models\Career;
use App\Mail\CareerMail;
use App\Mail\shwemawkun;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Mail\CareerApplierMail;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $career= Career::all();
            return response()->json($career, 200);

    }
    public function eachcv($cvname){
        $path = public_path('storage/cv' . '/' . $cvname);

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 ='data:'.mime_content_type($path).';base64,'.base64_encode($data);


        return response()->json(
            [
                'file'=>$base64,
            ]
        );
    }

    public function getEachcv($cvname){
        $path = public_path('storage/cv' . '/' . $cvname);

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 ='data:'.mime_content_type($path).';base64,'.base64_encode($data);


        return response()->json(
            [
                'file'=>$base64,
            ]
        );
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
     * @param  \App\Http\Requests\StoreCareerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCareerRequest $request)
    {
        $newname=rand(0, 99999999);
        $newNa=$newname.".".$request->file('file')->extension();
        $upload=$request->file('file')->storeAs('public/cv',$newNa);
        $Career = new Career();
        $Career->filename=$newNa;
        $Career->name=$request->name;
        $Career->studied=$request->studied;
        $Career->position=$request->position;
        $Career->phone=$request->phone;
        $Career->email=$request->email;
        $Career->about=$request->about;
        $Career->estatus=$request->estatus;
        $Career->save();
        $schoolEmail = "academic@smkeducationgroup.com";
        $email= $request->email;
        $name=$request->name;
        $filePath = storage_path("app/public/cv/$newNa");
        Mail::to($schoolEmail)->send(new CareerMail(
            $name,
            $filePath,
            $Career->studied,
            $Career->position,
            $Career->phone,
            $Career->email,
            $Career->estatus,
            $Career->about,
        ));
        Mail::to($email)->send(new CareerApplierMail($name));
        return response()->json($Career, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCareerRequest  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
            $career->delete();
            $path = public_path('storage/cv' . '/' . $career->filename);
            File::delete($path);

            return response()->json($career, 200);
    }
}
