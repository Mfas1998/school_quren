<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\Userreso;
;
class ParentsController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {

        $parents=parents::get();
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
            $parent=new identity();
        $parent->identity=$request->input('identtity_id');
             $parent->save();
             if($parent){
                return response()->json([
                     'message' => 'User successfully registered',
                    'identity' => $parent
                ], 201);
                // return $this->apiResponse($identity, message:"bbbnnnnn" ,status:201);

                }
                return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);

            $parent=new sex();
            $parent->sex=$request->input('sex_id');
             $parent->save();
            if($parent){
                return response()->json([
                    'message' => 'User successfully registered',
                    'sex' => $parent
                ], 201);
                // return $this->apiResponse($sex, message:"bbbnnnnn" ,status:201);

                }
                return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);
            $parent=new sexual();
            $parent->sexual=$request->input('sexual_id');
            $parent->save();
            if($parent){
                return response()->json([
                    'message' => 'User successfully registered',
                    'sexual' => $parent
                ], 201);
                // return $this->apiResponse($sexual, message:"bbbnnnnn" ,status:201);

                }
                return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);


//  return response()->json($users);

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name_parents' => 'required|string|max:255',
            'Phone' => 'required|digits:9',
            'Number_identity' => 'required|digits:5',
            'Job' => 'required|string|max:255',
            'link_kinship' => 'required|string|max:255',
            'Social_status' => 'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }



        $parents = parents::insert(
            array_merge(
                $validator->validated(),
                [ 'identtity_id'=>$request->identtity_id,
                'sex_id'=>$request->sex_id,
        'sexual_id'=>$request->sexual_id,
                ]
 )
        );

if($parents){
        return response()->json([
            'message' => 'parents successfully registered',
            'parents' => $parents
        ], 201);}
       else{ return response()->json([
            'message' => 'parents nut successfully registered',
            'parents' => $parents
        ], 400);}

}

    public function show(string $id)
    {
        $parents = parents::find($id);
        if($parents){
            return response()->json([
                'message' => 'parents not id successfully registered',
                'parents' => $parents
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
            'Name_parents' => 'required|string|max:255',
            'Phone' => 'required|digits:5',
            'Number_identity' => 'required|digits:5',
            'Job' => 'required|string|max:255',
            'link_kinship' => 'required|string|max:255',
            'Social_status' => 'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }



        $parents = parents::find($id);
        if(!$parents){
            return response()->json([
                'message' => 'parents not id successfully registered',
                'parents' => $parents
            ], 201);


                }

        $user->update(

            array_merge(
                    $validator->validated(),
                    [ 'identtity_id'=>$request->identtity_id,
                    'sex_id'=>$request->sex_id,
            'sexual_id'=>$request->sexual_id,
                    ]
                )
            );
            if($parents){return response()->json([
                'message' => 'parents successfully registered',
                'parents' => $parents
            ], 201);}
            else{ return response()->json([
            'message' => 'parents not successfully registered',
            'parents' => $parents
        ], 400);}

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parent = parents::find($id);
        if(!$parent){
            return response()->json([
                'message' => 'parents not id successfully registered',
                'parents' => $parent
            ], 201);
                }

        $parent->delete($id);
            if($parent){return response()->json([
                'message' => 'parents successfully registered',
                'parents' => $parent
            ], 201);}
        return response()->json([
            'message' => 'parents not successfully registered',
            'parents' => $parent
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $parent = parents::Truncate();;

            if($parent){return response()->json([
                'message' => 'parents successfully registered',
                'parents' => $parent
            ], 201);}
        return response()->json([
            'message' => 'parents not successfully registered',
            'parents' => $parent
        ], 400);

    }
}
