<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\Userreso;
use App\Http\Requests\Auth\GuardianRequest;
class GuardianController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {

        $guardian=guardian::get();
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $guardian
        ], 200);
    }
    public function create(Request $request)
    {
    }


    public function store(GuardianRequest $request)
    {
        // return response()->json([
        //         'message' => 'guardian not successfully registered',
        //         'guardian' => null
        //     ], 400);

        $guardian = guardian::create(
            array_merge( $request->validated(),
                ['password' => bcrypt($request->password)] ));

        if($guardian){return response()->json([
            'message' => 'guardian successfully registered',
            'guardian' => $guardian  ], 201);}
        else{ return response()->json([
        'message' => 'guardian not successfully registered',
        'guardian' => null
    ], 400);}

}

    public function show(string $id)
    {
        $guardian = guardian::find($id);
        if($guardian){
            return response()->json([
                'message' => 'guardian not id successfully registered',
                'guardian' => $guardian
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
            'name' => 'required|string|between:3,100',
             'gender' => 'required|digits:1',
            'job' => 'required|string|max:100',
            'social_status' => 'required|string|max:100',
            'email'  => 'required|string||max:100|unique:users',
            'phone' => 'required|digits_between:5,20|unique:users,phone',
            'password' => 'required|string|confirmed|min:6|unique:users,phone,password',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $guardian = guardian::find($id);
        if(!$guardian){
            return response()->json([
                'message' => 'guardian not id successfully registered',
                'guardian' => $guardian
            ], 201);
                }
        $guardian->update(
            array_merge(
                    $validator->validated(),
                    ['users_id'=>$request->users_id,                    ]));
            if($guardian){return response()->json([
                'message' => 'guardian successfully registered',
                'guardian' => $guardian  ], 201);}
            else{ return response()->json([
            'message' => 'guardian not successfully registered',
            'guardian' => $guardian
        ], 400);}

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guardian = guardian::find($id);
        if(!$guardian){
            return response()->json([
                'message' => 'guardian not id successfully registered',
                'guardian' => $guardian
            ], 201);
                }

        $guardian->delete($id);
            if($guardian){return response()->json([
                'message' => 'guardian successfully registered',
                'guardian' => $guardian
            ], 201);}
        return response()->json([
            'message' => 'guardian not successfully registered',
            'guardian' => $guardian
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $guardian = guardian::Truncate();;

            if($guardian){return response()->json([
                'message' => 'guardian successfully registered',
                'guardian' => $guardian
            ], 201);}
        return response()->json([
            'message' => 'guardian not successfully registered',
            'guardian' => $guardian
        ], 400);

    }
}
