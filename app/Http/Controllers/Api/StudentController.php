<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\parents;
use App\Models\quran_episades;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\Userreso;
;
class StudentController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {
        $students=student::get();
        return response()->json([
            'message' => 'student successfully registered',
            'student' => $students
        ], 200);
    }


    public function create(Request $request)
    {

        $validator=validator::make($request->all(),[
            'name'=>'required|varchar|max:255',]);
            if($validator->fails()){
                return $this->apiResponse(null, $validator->errors(),status:400);
            }
            $users=new sex();
            $users=new sexual();
            $users=new identity();
            $users=new parents();
            $users=new quran_episades();

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
            'Name_student' => 'required|string|max:255',
            'Date_birth' => 'required|Date',
            'Address' => 'required|string|max:255',
            'Chapret' => 'required|string|max:255',
            'School' => 'required|string|max:255',
            'Number_identity' => 'required|digits:5',
            'Previous_save' => 'required|string|max:255',
            'Current_save' => 'required|string|max:255',
            'Date_Join_Episode' => 'required|Date',


        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $students = student::insert(

            array_merge(
                $validator->validated(),
                [ 'identtity_id'=>$request->identtity_id,
                'sex_id'=>$request->sex_id,
        'sexual_id'=>$request->sexual_id,
        'parents_id'=>$request->parents_id,
        'quran_episodes_id'=>$request->quran_episodes_id,
                ]
 )
        );

if($students){
        return response()->json([
            'message' => 'students successfully registered',
            'students' => $students
        ], 201);}
       else{ return response()->json([
            'message' => 'students nut successfully registered',
            'students' => $students
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
            'Name_student' => 'required|string|max:255',
            'Date_birth' => 'required|Date',
            'Address' => 'required|string|max:255',
            'Chapret' => 'required|string|max:255',
            'School' => 'required|string|max:255',
            'Number_identity' => 'required|digits:5',
            'Previous_save' => 'required|string|max:255',
            'Current_save' => 'required|string|max:255',
            'Date_Join_Episode' => 'required|Date',


        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $students = student::find($id);
        if(!$students){
            return response()->json([
                'message' => 'students not id successfully registered',
                'students' => $students
            ], 201);


                }

        $students->update(

            array_merge(
                    $validator->validated(),
                    [ 'identtity_id'=>$request->identtity_id,
                    'sex_id'=>$request->sex_id,
            'sexual_id'=>$request->sexual_id,
            'parents_id'=>$request->parents_id,
            'quran_episodes_id'=>$request->quran_episodes_id,
                    ]
                )
            );
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
