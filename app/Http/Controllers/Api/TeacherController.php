<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\teacher;
use App\Models\Qualification_study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\Userreso;
;
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
            }
            $users=new sex();
            $users=new sexual();
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


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name_tracher' => 'required|string|max:255',
            'Date_birth' => 'required|Date',
            'Qualification' => 'required|string|max:255',
            'Work' => 'required|string|max:255',
            'Salary' => 'required|min:4',
            'phone' => 'required|digits:9',
            'Email' => 'required|email|max:100|unique:users',
            'Teaching_years' => 'required|date',
            'Center_they_work' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'Number_identity' => 'required|digits:9',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }



        $teachers = teacher::insert(
            // array_merge(
            //     $validator->validated(),
            //     [
            //         'identtity_id'=>$request->identtity_id,
            //     'sex_id'=>$request->sex_id,
            //     'sexual_id'=>$request->sexual_id,
            //                 'qualification_study_id'=>$request->qualification_study_id,
            //     ]
            // )
            [  'Name_tracher'=>$request->Name_tracher,
            'Date_birth'=>$request->Date_birth,
            'Qualification'=>$request->Qualification,
            'Work'=>$request->Work,
            'Salary'=>$request->Salary,
            'phone'=>$request->phone,
            'Email'=>$request->Email,
            'Teaching_years'=>$request->Teaching_years,
            'Center_they_work'=>$request->Center_they_work,
            'Address'=>$request->Address,
            'identtity_id'=>$request->identity_id,
            'Number_identity'=>$request->Number_identity,
            'sex_id'=>$request->sex_id,
            'sexual_id'=>$request->sexual_id,
            'qualification_study_id'=>$request->qualification_study_id,]


        );

if($teachers){
        return response()->json([
            'message' => 'teachers successfully registered',
            'teachers' => $teachers
        ], 201);}
       else{ return response()->json([
            'message' => 'teachers nut successfully registered',
            'parents' => $teachers
        ], 400);}

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
            'Name_tracher' => 'required|string|max:255',
            'Date_birth' => 'required|Date',
            'Qualification' => 'required|string|max:255',
            'Work' => 'required|string|max:255',
            'Salary' => 'required|min:4',
            'phone' => 'required|digits:9',
            'Email' => 'required|email|max:100|unique:users',
           'Teaching_years' => 'required|date',
            'Center_they_work' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'Number_identity' => 'required|digits:9',
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

        $teachers->update(
            [  'Name_tracher'=>$request->Name_tracher,
            'Date_birth'=>$request->Date_birth,
            'Qualification'=>$request->Qualification,
            'Work'=>$request->Work,
            'Salary'=>$request->Salary,
            'phone'=>$request->phone,
            'Email'=>$request->Email,
            'Teaching_years'=>$request->Teaching_years,
            'Center_they_work'=>$request->Center_they_work,
            'Address'=>$request->Address,
            'identtity_id'=>$request->identity_id,
            'Number_identity'=>$request->Number_identity,
            'sex_id'=>$request->sex_id,
            'sexual_id'=>$request->sexual_id,
            'qualification_study_id'=>$request->qualification_study_id,]
            // array_merge(
            //         $validator->validated(),
            //         [
            //             'identtity_id'=>$request->identtity_id,
            //         'sex_id'=>$request->sex_id,
            //         'sexual_id'=>$request->sexual_id,
            //                     'qualification_study_id'=>$request->qualification_study_id,
            //         ]
            //     )
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
