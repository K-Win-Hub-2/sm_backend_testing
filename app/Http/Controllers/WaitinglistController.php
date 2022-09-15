<?php

namespace App\Http\Controllers;

use App\Mail\ThankYou;
use App\Models\waitinglist;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorewaitinglistRequest;
use App\Http\Requests\UpdatewaitinglistRequest;

class WaitinglistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waitlist = waitinglist::all();
        return response()->json($waitlist, 200);
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
           $waitinglist = new waitinglist();
        $waitinglist->formdate=$request->formdate;
        $waitinglist->studentname=$request->studentname;
        $waitinglist->gender=$request->gender;
        $waitinglist->dateofbirth=$request->dateofbirth;
        $waitinglist->course=$request->course;
        $waitinglist->ans1=$request->ans1;
        $waitinglist->ans2=$request->ans2;
        $waitinglist->ans3=$request->ans3;
        $waitinglist->ans4=$request->ans4;
        $waitinglist->ans5=$request->ans5;
        $waitinglist->ans6=$request->ans6;
        $waitinglist->ans7=$request->ans7;
        $waitinglist->ans8=$request->ans8;
        $waitinglist->ans9=$request->ans9;
        $waitinglist->ans10=$request->ans10;
        $waitinglist->ans11=$request->ans11;
        $waitinglist->ans12=$request->ans12;
        $waitinglist->ans13=$request->ans13;
        $waitinglist->ans14=$request->ans14;
        $waitinglist->ans15=$request->ans15;
        $waitinglist->ans16=$request->ans16;
        $waitinglist->ans17=$request->ans17;
        $waitinglist->ans18=$request->ans18;
        $waitinglist->subname=$request->subname;
        $waitinglist->subemail=$request->subemail;
   
        $email= $request->subemail;
        $name=$request->studentname;
      
        Mail::to($email)->send(new ThankYou($name));
     
        $waitinglist->save();
        return response()->json($waitinglist, 200);
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

    public function deleteWaitlist($id)
    {
        $waitinglist = waitinglist::find($id);
        $waitinglist->delete();
        return response()->json($waitinglist, 200);
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
