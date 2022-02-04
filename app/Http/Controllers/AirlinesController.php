<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirlinesRequest;
use App\Models\Airlines;
use Exception;
use Illuminate\Http\Request;

class AirlinesController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            $airlines = Airlines::get();
            return response()->json([
                'data' => $airlines,
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
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirlinesRequest $request){
        try{
            $airline = new Airlines();
            $airline->name = $request->name;
            $airline->code = $request->code;
            $airline->save();
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
    public function update(AirlinesRequest $request, $id){
        try{
            $airline = Airlines::findOrFail($id);
            $airline->name = $request->name;
            $airline->code = $request->code;
            $airline->save();
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
    public function destroy($id){
        try{
            $airline = Airlines::findOrFail($id);
            $airline->delete();
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
