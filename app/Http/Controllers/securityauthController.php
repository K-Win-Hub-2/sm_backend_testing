<?php

namespace App\Http\Controllers;


use App\Models\ActiveToken;
use App\Models\useraccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class securityauthController extends Controller
{
    
    public function alreadyLogin(Request $request)
    {
        $userID=$request->userID;
        $localtoken=$request->localtoken;
        $deviceID=$request->deviceID;
        $actoken = ActiveToken::where('tokendetail',$localtoken)->where('userdeviceid',$deviceID)->where('userid',$userID)->first();
  


        if($actoken)
        {

            return response()->json([
                'userid' => $actoken->userid,
                'Token' => $actoken->tokendetail,
                'deviceID' => $actoken->userdeviceid,
                'state' => 'success',
                
            ]);
        }
        else 
        {
            return response()->json([
            
                'state' => 'failed',
                
            ]);
        }
    }

    public function login(Request $request)
    {
          $username=$request->username;
          $password=$request->password;
          $localtoken=$request->localtoken;
          $deviceID=$request->deviceID;

          $user = useraccount::where('username',$username)->where('password',$password)->first();
        
          if(!$user)
          {
            
            return response()->json([
                
                'state' => 'failed',
                
            ]);

          }
          else{
           
            // if localstorage is avaliable and deviceid is avaliable
            $actoken = ActiveToken::where('tokendetail',$localtoken)->where('userdeviceid',$deviceID)->first();
  


            if($actoken)
            {

                return response()->json([
                    'userid' => $actoken->userid,
                    'Token' => $actoken->tokendetail,
                    'deviceID' => $actoken->userdeviceid,
                    'state' => 'success',
                    
                ]);
            }
            else
            {
                $randtoken=Str::random(64);
                date_default_timezone_set('Asia/Yangon');
                $token=new ActiveToken();
                $token->userid=$user->id;
                $token->tokendetail=$randtoken;
                $token->createdtime=date('d-m-y h:i:s');
                $token->userdeviceid=$deviceID;
                $token->Save();
               
                return response()->json([
                    'userid' => $user->id,
                    'Token' => $randtoken,
                    'deviceID' => $deviceID,
                    'state' => 'success',
                    
                ]);
            }
          

        
          }
  
    }
}
