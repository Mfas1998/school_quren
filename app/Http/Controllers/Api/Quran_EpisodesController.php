<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\teacher;

use App\Models\system_episod;
use App\Models\quran_episodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\QuranEpisodesReques;

class Quran_EpisodesController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {

        $quran_episod=quran_episodes::get();
        return response()->json([
            'message' => 'quran_episodes successfully registered',
            'quran_episodes' => $quran_episod
        ], 200);
    }
    public function create(Request $request)
    {     $users=new teacher();
        $users=new system_episod();

    $users->type_users=$request->input('type_users');
         $users->save();
         if($users){
            return $this->apiResponse($users, message:"bbbnnnnn" ,status:201);
            }
            return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);

    }


    public function store(QuranEpisodesReques $request)
    {

        $quran_episod = quran_episodes::create(
            array_merge(
                $request->validated(), [
                // 'teacher_id'=>$request->teacher_id,
                    // 'system_episoded_id'=>$request->system_episoded_id,
                ] ));

if($quran_episod){return response()->json([
    'message' => 'quran _episod successfully registered','quran_episod' => $quran_episod,], 201);}
        return response()->json([
            'message' => 'quran_episod nut successfully registered',
            'quran_episod' => null
        ], 400);
}
    public function show(string $id)
    {
        $quran_episad = quran_episodes::find($id);
        if($quran_episad){
            return response()->json([
                'message' => 'quran_episad not id successfully registered',
                'quran_episad' => $quran_episad
            ], 201);
            }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'period'=>'required|digits:1',
            'gender'=>'required|digits:1',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $episad = quran_episodes::find($id);
        if(!$episad){
            return response()->json([
                'message' => 'quran_episad not id successfully registered',
                'quran_episad' => $episad
            ], 201); }
        $episad->update(
            array_merge(
                $validator->validated(),
                [ 'teacher_id'=>$request->teacher_id,
                'system_episoded_id'=>$request->system_episoded_id, ])  );
if($episad){
        return response()->json([
            'message' => 'quran_episad successfully registered',
            'quran_episad' => $episad
        ], 201);}
       else{ return response()->json([
            'message' => 'quran_episad nut successfully registered',
            'quran_episad' => $episad
        ], 400);}


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quran_episad = quran_episod::find($id);
        if(!$quran_episad){
            return response()->json([
                'message' => 'quran_episad not id successfully registered',
                'quran_episad' => $quran_episad
            ], 201);
                }

        $quran_episad->delete($id);
            if($quran_episad){return response()->json([
                'message' => 'quran_episad successfully registered',
                'quran_episad' => $quran_episad
            ], 201);}
        return response()->json([
            'message' => 'quran_episad not successfully registered',
            'quran_episad' => $quran_episad
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $quran_episad = quran_episod::Truncate();;

            if($quran_episad){return response()->json([
                'message' => 'User successfully registered',
                'user' => $quran_episad
            ], 201);}
        return response()->json([
            'message' => 'quran_episad not successfully registered',
            'quran_episad' => $quran_episad
        ], 400);

    }
}
