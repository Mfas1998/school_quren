<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\period;
use App\Models\sex;
use App\Models\system_episodes;
use App\Models\quran_episades;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class QuranEpisadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =quran_episades::all();
        return view('quran.index', compact('posts'));
       

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher=teacher::all();
         $period=period::all();
         $sex=sex::all();
        $system_episodes=system_episodes::all();
        return view('quran.episades',compact('teacher','period','sex','system_episodes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table(table:'quran_episades')->insert([
            'Id_teacher'=>$request->Id_teacher,
            'name_episodes'=>$request->name_episodes,
            'Id_period'=>$request->Id_period,
            'number_student'=>$request->number_student,
            'sex_id'=>$request->sex_id,
            'Id_system'=>$request->Id_system,
        ]);
      // return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('quran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(quran_episades $quran_episades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $post )
    {
        $post =quran_episades::find($post );
        $teacher=teacher::all();
        $period=period::all();
        $sex=sex::all();
       $system_episodes=system_episodes::all();
       return view('quran.edit',compact('post','teacher','period','sex','system_episodes'));
      }
   
    public function update(Request $request, $id)
    {
        $type_users=teacher::find($request->Id_teacher)->quran_episades();
        $type_users=period::find($request->Id_period);
       // $type_users=new quran_episades;
        $type_users= DB::table(table:'quran_episades')->where( 'id',$id)->update([
            'Id_teacher'=>$request->Id_teacher,
            'name_episodes'=>$request->name_episodes,
            'Id_period'=>$request->Id_period,
            'number_student'=>$request->number_student,
            'sex_id'=>$request->sex_id,
            'Id_system'=>$request->Id_system,
        ]);
        
        $type_users=sex::find($request->sex_id);
        $type_users=system_episodes::find($request->Id_system);
         return redirect()->route('quran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table(table:'quran_episades')->where( 'id',$id)->delete();
        return redirect()->route('quran.index');
        //return $id;
    }
     public function deleteTruncate(){
        DB::table(table:'quran_episades')->Truncate();
        return redirect()->route('quran.index');
     }
}
