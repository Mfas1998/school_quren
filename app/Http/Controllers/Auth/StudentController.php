<?php

namespace App\Http\Controllers;
use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\parents;
use App\Models\quran_episades;
use App\Models\student;
use App\Models\User;
use App\Models\type_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students =student::all();

        return view('student.index', compact('students'));
        // $posts = DB::table('students')->get();
        // return view('student.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identity=identity::all();
        $type=sex::all();
        $types=sexual::all();
        $parents=parents::all();
        $quran_episades=quran_episades::all();
        return view('student.insert',compact('identity','type','types','parents','quran_episades'));

    }

    public function store(Request $request)
    {
        DB::table(table:'students')->insert([
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
        $sex=sex::all();
        $sexual=sexual::all();
        $parents=parents::all();
        $quran_episades=quran_episades::all();

        return view( 'student.edit', compact('post','identity','sex','sexual','parents','quran_episades'));
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
