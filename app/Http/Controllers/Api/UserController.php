<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
// use App\Models\type_user;
use App\Models\user;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Suppor\Str;
use Illuminate\Support\Facades\Storage;
// use App\Http\Resources\Userreso;
use Hash;
use App\Http\Requests\Auth\ProfileUpdateRequest;

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

// <<<<<<< HEAD

// =======

// >>>>>>> 7898ff4144efd01bec89a009ac1a13b7b0d058c6


//  return response()->json($users);

    }


    public function store(ProfileUpdateRequest $request)
    {
        //$user=$request->User();
        $validateData=$request->validated();
       // $validateData['password']=Hash::make($validateData['password']);
        $user = User::create(
                [   'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'password' => bcrypt($request->password),
                'type_user_id'=>$request->type_user_id
                ]
            );


//Storage::disk('public')->put($imageName,file_get_contents($request->image));
                 if($user){   return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }
                  else{ return response()->json([
            'message' => 'User successfully registered',
            'user' => null
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
    public function update(ProfileUpdateRequest $request, $id) {
        $validateData=$request->validated();
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'User not id successfully registered',
                'user' => $user
            ], 201);
        }
        $user->update(
            [   'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password' => bcrypt($request->password),
        'type_user_id'=>$request->type_user_id
        ] );
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
