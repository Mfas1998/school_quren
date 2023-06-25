<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\type_user;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\Userreso;
;
class UserController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {
        // $users=userreso ::collection(user::get());
        $users=user::get();
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $users
        ], 200);
//  return $this->apiResponse($users, message:null ,status:200);

//return $this->apiResponse()
    //    return $this ->apiResponse(data:$users, message:'ok',status: 200);
    }


    public function create(Request $request)
    {

       


//  return response()->json($users);

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        //   'type_user_id' => 'required|integar|max=20',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $users=type_user::find($request->type_user_id);
        $user = User::create(
            array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password),
                    'type_user_id'=>$request->type_user_id
                    ]                )
                );
                if($user){
                    return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);}
                   else{ return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);}

    //
}

    public function show(string $id)
    {
        $user = User::find($id);
        if($user){
            return response()->json([
                'message' => 'User not id successfully registered',
                'user' => $user
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
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        //   'type_user_id' => 'required|integar|max=20',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'User not id successfully registered',
                'user' => $user
            ], 201);
        }
        $user->update(
            // $request->all()
            array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password),
                    'type_user_id'=>$request->type_user_id
                    ]
                )
            );
            if($user){return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);}
        return response()->json([
            'message' => 'User not successfully registered',
            'user' => $user
        ], 400);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'User not id successfully registered',
                'user' => $user
            ], 201);
                }

        $user->delete($id);
            if($user){return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);}
        return response()->json([
            'message' => 'User not successfully registered',
            'user' => $user
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $user = User::Truncate();;

            if($user){return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);}
        return response()->json([
            'message' => 'User not successfully registered',
            'user' => $user
        ], 400);

    }
}
