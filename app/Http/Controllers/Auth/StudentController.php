<?php

namespace App\Http\Controllers\Auth;
use App\Models\quran_episades;
use App\Models\gender;
// use App\Models\parents;
use App\Models\student;
use App\Models\guardian;
use App\Models\identity;
use App\Models\nationality;
// use App\Models\type_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Qualification_study;
use App\Http\Requests\Auth\StudenRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student =student::all();

        return view('student.index', compact('student'));
        // $posts = DB::table('students')->get();
        // return view('student.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationality=nationality::all();
        $identity=identity::all();
        $User=User::all();
        $Qualification_study=Qualification_study::all();
        $guardian=guardian::all();
        return view('student.insert',compact('nationality','identity','User','Qualification_study','guardian'));

    }

    public function store(StudenRequest $request)
    {
        $imageName =  $request-> image -> getClientOriginalExtension();
        $image_nam=time().'.'.$imageName;
        $path='imagesfp';
        $request->image->move($path,$image_nam);
        // $students = student::create(array_merge(
        //     $request->validated(),
        //         [
        //         'image'=>$nameee,
        //         ]));
        DB::table(table:'students')->insert([
            // student::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'school'=>$request->school,
            'identity_id'=>$request->identity_id,
            'number_identity'=>$request->number_identity,
            'gender'=>$request->gender,
            'nationality_id'=>$request->nationality_id,
            'guardian_id'=>$request->guardian_id,
            'previous_save'=>$request->previous_save,
            'date_Join'=>$request->date_Join,
            'quran_episodes_id'=>$request->quran_episodes_id,
            'users_id'=>$request->users_id,
            'image'=>$image,
            'birth_date'=>$request->birth_date,
        ]);
        //  return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        return view(view:'user.indexs');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post=student::find($post);
        $identity=identity::all();
        $sex=gender::all();
        $sexual=nationality::all();
        $parents=guardian::all();
        $quran_episad=quran_episad::all();

        return view( 'student.edit', compact('post','identity','sex','sexual','parents','quran_episad'));
//         $post = DB::table(table:'students')->where( 'id',$id)->first();
//          //    return response(content: 'تم الاضافة بنجاح');
//     //return $post;
//    return view( 'student.edit', compact('post'));
// //    return redirect()->route('studebt.index')
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $type_users= DB::table(table:'students')->where('id',$id)->update([

            'Name_student'=>$request->Name_student,
            'Date_birth'=>$request->Date_birth,
            'Address'=>$request->Address,
            'Chapret'=>$request->Chapret,
            'School'=>$request->School,
            'identtity_id'=>$request->identtity_id,
            'Number_identity'=>$request->Number_identity,
            'sex_id'=>$request->sex_id,
            'sexual_id'=>$request->sexual_id,
            'parents_id'=>$request->parents_id,
            'Previous_save'=>$request->Previous_save,
            'Current_save'=>$request->Current_save,
            'Date_Join_Episode'=>$request->Date_Join_Episode,
            'quran_episodes_id'=>$request->quran_episodes_id,

        ]);
        $type_users=identity::find($request->identity_id);
        $type_users=sex::find($request->sex_id);
        $type_users=sexual::find($request->sexual_id);
        $type_users=sex::find($request->sexparents_id_id);
        $type_users=sexual::find($request->quran_episodes_id);
        //  return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // DB::table(table:'students')->where( 'id',$id)->delete();
        // return redirect()->route('studebt.index');
    }
    public function deleteTruncate(){
        DB::table(table:'students')->Truncate();
        return redirect()->route('studebt.index');
     }



}
