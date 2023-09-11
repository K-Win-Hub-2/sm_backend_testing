<?php

namespace App\Http\Controllers;

use App\Mail\ThankYou;
use App\Mail\waitlist;
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
      $schoolEmail = 'arkar.testing.smk@gmail.com';

           $waitinglist = new waitinglist();
        $waitinglist->formdate=$request->formdate ?? 'Not set!';
        $waitinglist->studentname=$request->studentname ?? 'Not set!';
        $waitinglist->gender=$request->gender ?? 'Not set!';
        $waitinglist->dateofbirth=$request->dateofbirth ?? 'Not set!';
        $waitinglist->course=$request->course ?? 'Not set!';
        $waitinglist->ans1=$request->ans1 ?? 'Not set!';
        $waitinglist->ans2=$request->ans2 ?? 'Not set!';
        $waitinglist->ans3=$request->ans3 ?? 'Not set!';
        $waitinglist->ans4=$request->ans4 ?? 'Not set!';
        $waitinglist->ans5=$request->ans5 ?? 'Not set!';
        $waitinglist->ans6=$request->ans6 ?? 'Not set!';
        $waitinglist->ans7=$request->ans7 ?? 'Not set!';
        $waitinglist->ans8=$request->ans8 ?? 'Not set!';
        $waitinglist->ans9=$request->ans9 ?? 'Not set!';
        $waitinglist->ans10=$request->ans10 ?? 'Not set!';
        $waitinglist->ans11=$request->ans11 ?? 'Not set!';
        $waitinglist->ans12=$request->ans12 ?? 'Not set!';
        $waitinglist->ans13=$request->ans13 ?? 'Not set!';
        $waitinglist->ans14=$request->ans14 ?? 'Not set!';
        $waitinglist->ans15=$request->ans15 ?? 'Not set!';
        $waitinglist->ans16=$request->ans16 ?? 'Not set!';
        $waitinglist->ans17=$request->ans17 ?? 'Not set!';
        $waitinglist->ans18=$request->ans18 ?? 'Not set!';
        $waitinglist->subname=$request->subname ?? 'Not set!';
        $waitinglist->subemail=$request->subemail ?? 'Not set!';
   
        $email= $request->subemail;
        $name=$request->studentname ?? 'Not set!';
        // return response()->json($waitinglist, 200);
        Mail::to($email)->send(new ThankYou($name));
        Mail::to($schoolEmail)->send(new waitlist($waitinglist));
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
