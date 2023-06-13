<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;

use App\Models\teacher;
use App\Models\period;
use App\Models\sex;
use App\Models\system_episodes;
use App\Models\quran_episades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\Userreso;
;
class QuranEpisadesController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {

        $parents=quran_episades::get();
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $parents
        ], 200);
    }


    public function create(Request $request)
    {

        $validator=validator::make($request->all(),[
            'name'=>'required|varchar|max:255',]);
            if($validator->fails()){
                return $this->apiResponse(null, $validator->errors(),status:400);
            }
            $users=new teacher();
            $users=new system_episodes();
            $users=new sex();
        $users=new period();
        $users->type_users=$request->input('type_users');
             $users->save();
             if($users){
                return $this->apiResponse($users, message:"bbbnnnnn" ,status:201);

                }
                return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);


//  return response()->json($users);

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_episodes'=>'required|string|max:255',
            'number_student'=>'required|digits:3',


        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $quran_episad = quran_episades::insert(

            array_merge(
                $validator->validated(),
                [ 'Id_teacher'=>$request->Id_teacher,
                'Id_period'=>$request->Id_period,
        'sex_id'=>$request->sex_id,
        'Id_system'=>$request->Id_system,
                ]
 )
        );

if($quran_episad){
        return response()->json([
            'message' => 'quran_episad successfully registered',
            'quran_episad' => $quran_episad
        ], 201);}
       else{ return response()->json([
            'message' => 'quran_episad nut successfully registered',
            'quran_episad' => $quran_episad
        ], 400);}
    //
}

    public function show(string $id)
    {
        $quran_episad = quran_episades::find($id);
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
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name_episodes'=>'required|string|max:255',
            'number_student'=>'required|digits:3',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

       $quran_episad = quran_episades::find($id);
        if(!$quran_episad){
            return response()->json([
                'message' => 'quran_episad not id successfully registered',
                'quran_episad' => $quran_episad
            ], 201);


                }

        $quran_episad->update(

            array_merge(
                    $validator->validated(),
                    [ 'Id_teacher'=>$request->Id_teacher,
                    'Id_period'=>$request->Id_period,
            'sex_id'=>$request->sex_id,
            'Id_system'=>$request->Id_system,
                    ]
                )
            );
            if($quran_episad){return response()->json([
                'message' => 'quran_episad successfully registered',
                'quran_episad' => $quran_episad
            ], 201);}
            else{return response()->json([
            'message' => 'quran_episad not successfully registered',
            'quran_episad' => $quran_episad
        ], 400);}

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quran_episad = quran_episades::find($id);
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
        $quran_episad = quran_episades::Truncate();;

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
