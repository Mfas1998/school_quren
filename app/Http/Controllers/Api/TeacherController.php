<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;

use App\Models\identity;
use App\Models\teacher;
use App\Models\User;
// use App\Models\nationality;
use App\Models\Qualification_study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\TeacherRequest;

class TeacherController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {
     $teachers=teacher::get();
        return response()->json([
            'message' => 'teacher successfully registered',
            'teacher' => $teachers
        ], 200);
    }


    public function create(Request $request)
    {
        $validator=validator::make($request->all(),[
            'name'=>'required|varchar|max:255',]);
            if($validator->fails()){
                return $this->apiResponse(null, $validator->errors(),status:400);
            } $users=new User();

            $users=new identity();
        $users=new Qualification_study();
        $users->type_users=$request->input('type_users');
             $users->save();
             if($users){
                return $this->apiResponse($users, message:"bbbnnnnn" ,status:201);

                }
                return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);


//  return response()->json($users);

    }
    public function store(TeacherRequest $request)
    {
        $teach = teacher::create(
            array_merge(
                $request->validated(), [
                    'password' => bcrypt($request->password),
                    // 'job_id' =>$request->job_id
                ] ));

        if($teach){return response()->json([
                'message' => 'teachers successfully registered','teachers' => $teach, ], 201);}
            return response()->json([
            'message' => 'teachers not successfully registered','teachers' => null], 400);
    }

    public function show(string $id)
    {
        $teachers = teacher::find($id);
        if($teachers){
            return response()->json([
                'message' => 'teacher not id successfully registered',
                'teacher' => $teachers
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
    //
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'qualification' => 'required|string|max:70',
            'work' => 'required|string|max:100',
            'salary' => 'required|min:4',
            'teaching_years' => 'required|date',
            'center_they_work' => 'required|string|max:100',
            'address' => 'required|string|max:50',
            'number_identity' => 'required|digits_between:5,20',
            'gender' => 'required|digits:1',
            'birth_date' => 'required|date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $teachers = teacher::find($id);
        if(!$teachers){
            return response()->json([
                'message' => 'teachers not id successfully registered',
                'teachers' => $teachers
            ], 201);
                }

        $teachers->update(   $validator->validated(), [
            'identity_id'=>$request->identtity_id,
            'nationality_id'=>$request->nationality_id,
            'qualification_study_id'=>$request->qualification_study_id,
            'users_id'=>$request->users_id,]
        );
            if($teachers){return response()->json([
                'message' => 'teachers successfully registered',
                'teachers' => $teachers
            ], 201);}
       else{ return response()->json([
            'message' => 'teachers not successfully registered',
            'teachers' => $teachers
        ], 400);}
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teachers = teacher::find($id);
        if(!$teachers){
            return response()->json([
                'message' => 'teachers not id successfully registered',
                'teachers' => $teachers
            ], 201);
                }

        $teachers->delete($id);
            if($teachers){return response()->json([
                'message' => 'teachers successfully registered',
                'teachers' => $user
            ], 201);}
        return response()->json([
            'message' => 'teachers not successfully registered',
            'teachers' => $user
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $teachers = teacher::Truncate();;

            if($teachers){return response()->json([
                'message' => 'teachers successfully registered',
                'teachers' => $teachers
            ], 201);}
        return response()->json([
            'message' => 'teachers not successfully registered',
            'teachers' => $teachers
        ], 400);

    }
}
