<?php

namespace App\Http\Controllers\Auth;
// use App\Models\sex;
use App\Models\nationality;
use App\Models\identity;
use App\Models\teacher;
use App\Models\Job;
use App\Models\gender;
use App\Models\Qualification_study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Auth\TeacherRequest;
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
        $nationality=nationality::all();
        $gender=gender::all();
        $Qualification_study=Qualification_study::all();
        $job=Job::all();
        return view('teacher.insert',compact('identity','nationality','gender','Qualification_study','job'));
    }
    public function store(Request $request)
    {
        // DB::table(table:'teachers')->insert(
            teacher::create(
                // array_merge(
                //     $request->validated(), [
                //         'password' => bcrypt($request->password),
                //         // 'job_id' =>$request->job_id
                //     ] )
                [
            'name'=>$request->name,
            'work'=>$request->work,
            'salary'=>$request->salary,
            'teaching_years'=>$request->teaching_years,
            'center_they_work'=>$request->center_they_work,
            'address'=>$request->address,
            'identity_id'=>$request->identity_id,
            'number_identity'=>$request->number_identity,
            'gender_id'=>$request->gender_id,
            'nationality_id'=>$request->nationality_id,
            'birth_date'=>$request->birth_date,
            'qualification_study_id'=>$request->qualification_study_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'job_id'=>$request->job_id,
        ]
    );
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
        $posts=teacher::find($post);
        $identity=identity::all();
        $nationality=nationality::all();
        $gender=gender::all();
        $Qualification_study=Qualification_study::all();
        $job=Job::all();
        return view('teacher.edit',compact('identity','nationality','gender','Qualification_study','job','posts'));
        // $post = DB::table(table:'teachers')->where( 'id',$id)->first();
            // return response(content: 'تم الاضافة بنجاح');
    //return $post;
//    return view( 'teacher.edit', compact('post'));
//    return redirect()->route('quran.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $identity=identity::find($request->identity_id);
        // $nationality=nationality::find($request->nationality_id);
        // $Qualification_study=Qualification_study::find($request->qualification_study_id);
        // $userss=User::find($request->users_id);
        teacher::where('id',$id)->update([
            'name'=>$request->name,
            'work'=>$request->work,
            'salary'=>$request->salary,
            'teaching_years'=>$request->teaching_years,
            'center_they_work'=>$request->center_they_work,
            'address'=>$request->address,
            'identity_id'=>$request->identity_id,
            'number_identity'=>$request->number_identity,
            'gender_id'=>$request->gender_id,
            'nationality_id'=>$request->nationality_id,
            'birth_date'=>$request->birth_date,
            'qualification_study_id'=>$request->qualification_study_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'job_id'=>$request->job_id,
        ]);
        // return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('teacher.index');


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
