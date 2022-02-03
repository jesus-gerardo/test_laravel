<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportsRequest;
use Illuminate\Http\Request;
use App\Models\Airport;
use Exception;

class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            $airport = Airport::get();
            return response()->json([
                'data' => $airport,
                'error' => null
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'data' => [],
                'error' => $e->getMessage()
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportsRequest $request){
        try{
            $airport = new Airport();
            $airport->name = $request->name;
            $airport->code = $request->code;
            $airport->city = $request->city;
            $airport->save();
            return response()->json([
                'success' => true,
                'error' => null
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirportsRequest $request, $id){
        try{
            $airport = Airport::findOrFail($id);
            $airport->name = $request->name;
            $airport->code = $request->code;
            $airport->city = $request->city;
            $airport->save();
            return response()->json([
                'success' => true,
                'error' => null
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
