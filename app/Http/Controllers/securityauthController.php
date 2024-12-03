<?php

namespace App\Http\Controllers;


use App\Models\ActiveToken;
use App\Models\useraccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class securityauthController extends Controller
{
    public function logoutanother(Request $request)
    {
        $userID=$request->userID;
        $localtoken=$request->localtoken;
        $deviceID=$request->deviceID;
        $deleteanother= ActiveToken::where('tokendetail','<>',$localtoken)->where('userdeviceid','<>',$deviceID)->where('userid',$userID)->delete();

        return response()->json([

            'state' => 'deleted',

        ]);
    }
    public function logout(Request $request)
    {
        $userID=$request->userID;
        $localtoken=$request->localtoken;
        $deviceID=$request->deviceID;
        $deleteanother= ActiveToken::where('tokendetail',$localtoken)->where('userdeviceid',$deviceID)->where('userid',$userID)->delete();

        return response()->json([

            'state' => 'logout',

        ]);
    }

    public function alreadyLogin(Request $request)
    {
        $userID=$request->userID;
        $localtoken=$request->localtoken;
        $deviceID=$request->deviceID;
        $actoken = ActiveToken::where('tokendetail',$localtoken)->where('userdeviceid',$deviceID)->where('userid',$userID)->first();
        $user = useraccount::findOrFail($userID);
        $role = $user->role;
          if($role === '0'){
            $isSuperAdmin='true';
          }else{
            $isSuperAdmin='false';
          }

        if($actoken)
        {

            return response()->json([
                'userid' => $actoken->userid,
                'Token' => $actoken->tokendetail,
                'deviceID' => $actoken->userdeviceid,
                'state' => 'success',
                'isSuperAdmin' => $isSuperAdmin
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
        $user_ID=$request->userID;
          $username=$request->username;
          $password=$request->password;
          $localtoken=$request->localtoken;
          $deviceID=$request->deviceID;

          $user = useraccount::where('username',$username)->where('password',$password)->first();

          $role = $user->role;
          if($role === '0'){
            $isSuperAdmin='true';
          }else{
            $isSuperAdmin='false';
          }
          if(!$user)
          {

            return response()->json([

                'state' => 'failed',

            ]);

          }
          else{

            // if localstorage is avaliable and deviceid is avaliable
            $actoken = ActiveToken::where('tokendetail',$localtoken)->where('userdeviceid',$deviceID)->where('userid',$user_ID)->first();



            if($actoken)
            {
                $anotherDevice = ActiveToken::where('tokendetail','<>',$localtoken)->where('userdeviceid','<>',$deviceID)->where('userid',$user_ID)->first();

                if($anotherDevice)
                {
                    $isanother='true';
                }
                else{
                    $isanother='false';
                }
                return response()->json([
                    'userid' => $actoken->userid,
                    'Token' => $actoken->tokendetail,
                    'deviceID' => $actoken->userdeviceid,
                    'anotherDevice'=>$isanother,
                    'state' => 'alreadylogin',
                    'isSuperAdmin' => $isSuperAdmin
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

                $anotherDevice = ActiveToken::where('tokendetail','<>',$randtoken)->where('userdeviceid','<>',$deviceID)->where('userid',$user->id)->first();
                if($anotherDevice)
                {
                    $isanother='true';
                }
                else{
                    $isanother='false';
                }


                return response()->json([
                    'userid' => $user->id,
                    'Token' => $randtoken,
                    'deviceID' => $deviceID,
                    'anotherDevice'=>$isanother,
                    'state' => 'success',
                    'isSuperAdmin' => $isSuperAdmin
                ]);
            }



          }

    }
}
