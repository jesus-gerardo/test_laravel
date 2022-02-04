<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightsRequest;
use App\Models\Airlines;
use App\Models\Airport;
use App\Models\Flights;
use Exception;
use Illuminate\Http\Request;

class FlightsController extends Controller
{

    public function __construct(){
        // $this->authorizeResource('flight');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            // $this->authorize('view');
            $fligth = Flights::with([
                'departure',
                'destination',
                'airline'
            ])->get();
            return response()->json([
                'data' => $fligth,
                'error' => null
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'data' => [],
                'error' => $e->getMessage()
            ], 200);
        }
    }

    public function catalogue(){
        try{
            // $this->authorize('view');
            $airlines = Airlines::get();
            $airports = Airport::get();
            return response()->json([
                'airline' => $airlines,
                'airports' => $airports,
                'error' => null
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'airline' => [],
                'airports' => [],
                'error' => $e->getMessage()
            ], 200);
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlightsRequest $request){
        try{
            // $this->authorize('create');
            $fligth = new Flights();
            $fligth->code = $request->code;
            $fligth->type = $request->type;
            $fligth->departure_id = $request->departure_id;
            $fligth->destination_id = $request->destination_id;
            $fligth->departure_time = $request->departure_time;
            $fligth->arrival_time = $request->arrival_time;
            $fligth->airline_id = $request->airline_id;
            $fligth->save();

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
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlightsRequest $request, $id){
        try{ 
            // $this->authorize('update');
            $fligth = Flights::findOrFail($id);
            $fligth->code = $request->code;
            $fligth->type = $request->type;
            $fligth->departure_id = $request->departure_id;
            $fligth->destination_id = $request->destination_id;
            $fligth->departure_time = $request->departure_time;
            $fligth->arrival_time = $request->arrival_time;
            $fligth->airline_id = $request->airline_id;
            $fligth->save();
            return response()->json([
                'success' => true,
                'error' => null
            ], 200);
        }catch(Exception $e) {
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
    public function destroy($id){
        try{
            $fligth = Flights::findOrFail($id);
            $fligth->delete();
            return response()->json([
                'success' => true
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 200);
        }
    }
}
