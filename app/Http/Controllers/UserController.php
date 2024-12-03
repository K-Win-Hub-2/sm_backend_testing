<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ActiveToken;
use App\Models\useraccount;
use Nette\Utils\Validators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = useraccount::get();
        return response()->json([
            "status" => 200,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Use Validator::make, not Validators::make
        $validator = Validator::make($request->all(), [
            "username" => ['required', 'string', 'max:255'],
            "password" => ['required', 'string', 'min:8'], // Ensure the password confirmation field is present
            "role" => ['required', 'string', 'max:1'], // 'enum' is not a valid rule. Use 'in' for specific values.
            "address" => ['nullable', 'string', 'max:255'],
            "phone" => ['nullable', 'numeric', 'digits:11'], // 'number' is not valid. Use 'numeric' or 'digits'
        ]);

        // Check validation
        if ($validator->fails()) {
            return response()->json([
                "status" => 422,
                "errors" => $validator->errors()
            ], 422);
        }

        // Create user
        $validatedData = $validator->validated();

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $user = useraccount::create($validatedData);
        ActiveToken::create([
            'userid' => $user->id,
            'tokendetail' => $validatedData['tokendetail'] ?? null,
            'createdtime' => Carbon::now(),
            'userdeviceid' => $validatedData['userdeviceid'] ?? null,
        ]);

        return response()->json([
            "status" => 200,
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            "username" => ['sometimes', 'string', 'max:255'], // 'sometimes' means optional
            "password" => ['nullable', 'string', 'min:8'],
            "role" => ['sometimes', 'string', 'max:1'],
            "address" => ['nullable', 'string', 'max:255'],
            "phone" => ['nullable', 'numeric', 'digits:11'],
            "tokendetail" => ['sometimes', 'string', 'max:255'],
            "userdeviceid" => ['sometimes', 'string', 'max:255'],
        ]);

        // Check validation
        if ($validator->fails()) {
            return response()->json([
                "status" => 422,
                "errors" => $validator->errors()
            ], 422);
        }

        // Find the user
        $user = UserAccount::find($id);
        if (!$user) {
            return response()->json([
                "status" => 404,
                "message" => "User not found"
            ], 404);
        }

        // Update user details
        $validatedData = $validator->validated();

        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']); // Hash password if provided
        }

        $user->update($validatedData);

        // Update ActiveToken if provided
        if (isset($validatedData['tokendetail']) || isset($validatedData['userdeviceid'])) {
            $activeToken = ActiveToken::where('userid', $id)->first();

            if ($activeToken) {
                $activeToken->update([
                    'tokendetail' => $validatedData['tokendetail'] ?? $activeToken->tokendetail,
                    'userdeviceid' => $validatedData['userdeviceid'] ?? $activeToken->userdeviceid,
                    'createdtime' => Carbon::now(), // Update the timestamp
                ]);
            } else {
                // Optionally, create a new ActiveToken if one doesn't exist
                ActiveToken::create([
                    'userid' => $user->id,
                    'tokendetail' => $validatedData['tokendetail'] ?? Str::random(64),
                    'createdtime' => Carbon::now(),
                    'userdeviceid' => $validatedData['userdeviceid'] ?? '',
                ]);
            }
        }

        return response()->json([
            "status" => 200,
            "message" => "User updated successfully",
            "user" => $user
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = useraccount::findOrFail($id);
        $user->delete();
        return response()->json([
            "status" => 200,
            "message" => "User deleted successfully"
        ], 200);
    }
}
