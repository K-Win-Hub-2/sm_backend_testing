<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getYear() {
        $year = Year::find(1);
        $response = (object) [] ;
        $response->year = $year->year;
        $response->discription= json_decode($year->discription);
        return response()->json($response);

        // return response()->json_decode($year,200);
    }
    public function create() {
        $year = new Year;
        $objects = [
            (object)['name' => 'hello'],
            (object)['name' => 'world'],
            // ... more objects
        ];
        $year->year = '2023';
        $year->discription = json_encode($objects);
        // $year->year = $request->year;
        // $year->discription = $request->discriptions;
        $year->save();
        return response()->json($year, 200);
    }
    public function update(Request $request) {
        $year = Year::find($request->id);
        $year->year = $request->year;
        $year->discription = json_encode($request->discription);
        $year->save();
        return response()->json($year,200);
    }
}
