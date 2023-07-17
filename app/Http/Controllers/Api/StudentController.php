<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Models\student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\Auth\StudenRequest;
class StudentController extends Controller
{

    public function index()
    {
        $students=student::get();
        return response()->json([
            'message' => 'student successfully registered',
            'student' => $students
        ], 200);
    }
    public function create(Request $request)
    {    }
    public function store(StudenRequest $request)
    {
        $imageName =  $request-> image -> getClientOriginalExtension();
        $nameee=time().'.'.$imageName;
        $path='imagesfp';
        $request->image->move($path,$nameee);
        // $users=User ::where('active', 1)->max('id');
        $students = student::create(array_merge(
            $request->validated(),
                [
                'image' =>$nameee,
                'password' => bcrypt($request->password)    ]));
if($students){
        return response()->json([
            'message' => 'students successfully registered',
            'students' => $students
        ], 201);}
       else{ return response()->json([
            'message' => 'students nut successfully registered',
            'students' => null
        ], 400);}
}
    public function show(string $id)
    {
        $students = student::find($id);
        if($students){
            return response()->json([
                'message' => 'students not id successfully registered',
                'students' => $students
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
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:50',
            'school' => 'required|string|max:50',
            'number_identity' => 'required|digits:5',
            'gender' => 'required|digits:1',
            'link_kinship' => 'required|string|max:100',
            'previous_save' => 'required|string|max:50',
            'date_Join' => 'required|Date',
            'birth_date' => 'required|Date',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $students = student::find($id);
        if(!$students){
            return response()->json([
                'message' => 'students notggggg id successfully registered',
                'students' => $students
            ], 201);
                }
        $students->update(  array_merge(
            $validator->validated(),
            [ 'identity_id'=>$request->identity_id,
            'nationality_id'=>$request->nationality_id,
            'guardian_id'=>$request->guardian_id,
            'quran_episodes_id'=>$request->quran_episodes_id,
            'users_id'=>$request->users_id,  ]));
            if($students){return response()->json([
                'message' => 'students successfully registered',
                'students' => $students
            ], 201);}
            else{ return response()->json([
                    'message' => 'students not successfully registered',
                    'students' => $students
                ], 400);}


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = student::find($id);
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
        $user = student::Truncate();;

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
