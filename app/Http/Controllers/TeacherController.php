<?php

namespace App\Http\Controllers;
use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\teacher;
use App\Models\Qualification_study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TeacherController extends Controller
{

    public function index()
    {
        $posts =teacher::all();
        return view('teacher.index', compact('posts'));
    }

        public function create()
    {
        $identity=identity::all();
        $sex=sex::all();
        $sexual=sexual::all();
        $Qualification_study=Qualification_study::all();
        return view('teacher.insert',compact('identity','sex','sexual','Qualification_study'));
    }
    public function store(Request $request)
    {
        DB::table(table:'teachers')->insert([
            'Name_tracher'=>$request->Name_tracher,
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
            'qualification_study_id'=>$request->qualification_study_id,
        ]);
        // return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post=teacher::find($post);
        $identity=identity::all();
        $type=sex::all();
        $types=sexual::all();
        $Qualification_study=Qualification_study::all();
        return view( 'teacher.edit', compact('post','identity','type','types','Qualification_study'));
        // $post = DB::table(table:'teachers')->where( 'id',$id)->first();
         //    return response(content: 'تم الاضافة بنجاح');
    //return $post;
//    return view( 'teacher.edit', compact('post'));
//    return redirect()->route('quran.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $type_users= DB::table(table:'teachers')->where('id',$id)->update([
             'Name_tracher'=>$request->Name_tracher,
            'Date_birth'=>$request->Date_birth,
            'Qualification'=>$request->Qualification,
            'Work'=>$request->Work,
            'Salary'=>$request->Salary,
            'phone'=>$request->phone,
            'Email'=>$request->Email,
            'Teaching_years'=>$request->Teaching_years,
            'Center_they_work'=>$request->Center_they_work,
            'Address'=>$request->Address,
             'Number_identity'=>$request->Number_identity,
                  ]);
        $type_users=identity::find($request->identity_id);
        $type_users=sex::find($request->sex_id);
        $type_users=sexual::find($request->sexual_id);
        $type_users=Qualification_study::find($request->qualification_study_id);
    //  return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('teacher.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table(table:'teachers')->where( 'id',$id)->delete();
        return redirect()->route('teacher.index');
        //return $id;
    }
     public function deleteTruncate(){
        DB::table(table:'teachers')->Truncate();
        return redirect()->route('teacher.index');
     }


}
