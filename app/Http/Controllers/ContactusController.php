<?php

namespace App\Http\Controllers;

use view;
use App\Mail\SignUp;
use App\Mail\ThankYou;
use App\Models\contactus;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Mail\ContactUsApplierMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorecontactusRequest;
use App\Http\Requests\UpdatecontactusRequest;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = contactus::all();
        return response()->json($contact, 200);
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
     * @param  \App\Http\Requests\StorecontactusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecontactusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function show(contactus $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit(contactus $contactus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecontactusRequest  $request
     * @param  \App\Models\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecontactusRequest $request, contactus $contactus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactus $contactus)
    {


    }

        public function deleteContactus($id)
        {
            $contactus = contactus::find($id);
            $contactus->delete();
            return response()->json($contactus, 200);
        }


       public function sendMail(Request $request)
       {
        // $schoolEmail = "academic@smkeducationgroup.com";
        // $schoolEmail = "shwemawkunschool@gmail.com";
        $schoolEmail = "info@smkeducationgroup.com";


        if($request->Admission === 'admission') {
        // $schoolEmail = "shwemawkunschool@gmail.com";
        //   $schoolEmail = "academic@smkeducationgroup.com";
        $schoolEmail = "info@smkeducationgroup.com";
        }

        $contactus = new contactus();

        $contactus->name=$request->Name;
        $contactus->email=$request->Email;
        $contactus->phone=$request->Phone;
        $contactus->subject=$request->Subject;
        $contactus->content=$request->Content;



        $contactus->save();

        $email= $request->Email;
        $name=$request->Name;

        // Mail::to($email)->cc($schoolEmail)->send(new ThankYou($name));

        Mail::to($schoolEmail)->send(new ContactUsMail(
            $name,
            $contactus->email,
            $contactus->phone,
            $contactus->subject,
            $contactus->content
        ));

        Mail::to($email)->send(new ContactUsApplierMail($name));

      // Mail::to($email)->cc('thandarmt.93@gmail.com')->send(new ThankYou($name));

        return response()->json($contactus, 200);

        // Mail::to($email)->send(new SignUp());

       }


       public function mailform(Request $request)
       {
        $name2= 'sithuhein26@gmail.com';

        return view('contactusmail',compact('name2'));
       }

       public function sendemail(Request $request)
       {
        Mail::to($request->email)->send(new ThankYou($email));
        return response()->json('hello', 200);
       }

}
