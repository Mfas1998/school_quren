<?php

namespace App\Http\Controllers\Auth;

use App\Models\teacher;
use App\Models\period;
use App\Models\sex;
use App\Models\system_episod;
use App\Models\quran_episodes;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class QuranEpisadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =quran_episodes::all();
        return view('quran.index', compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher=teacher::all();
        $system_episodes=system_episod::all();
        return view('quran.episades',compact('teacher','system_episodes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DB::table(table:'quran_episades')->insert(
            quran_episodes::create([
            'name'=>$request->name,
            'teacher_id'=>$request->teacher_id,
            'period'=>$request->period,
            'gender'=>$request->gender,
            'system_episoded_id'=>$request->system_episoded_id,
        ]);
      // return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('quran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(quran_episa $quran_episades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $post )
    {
        $post =quran_episodes::find($post );
        $teacher=teacher::all();
        $system_episodes=system_episod::all();
       return view('quran.edit',compact('post','teacher','system_episodes'));
      }

    public function update(Request $request, $id)
    {
        $type_users=teacher::find($request->teacher_id);
        $type_users=system_episod::find($request->system_episoded_id);
        // $type_users= DB::table(table:'quran_episades')->where( 'id',$id)->update(
            quran_episodes::where( 'id',$id)->update([
                'name'=>$request->name,
                'teacher_id'=>$request->teacher_id,
                'period'=>$request->period,
                'gender'=>$request->gender,
                'system_episoded_id'=>$request->system_episoded_id,
        ]);

        // $type_users=sex::find($request->sex_id);
        // $type_users=system_episod::find($request->Id_system);
         return redirect()->route('quran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table(table:'quran_episodes')->where( 'id',$id)->delete();
        return redirect()->route('quran.index');
        //return $id;
    }
     public function deleteTruncate(){
        DB::table(table:'quran_episodes')->Truncate();
        return redirect()->route('quran.index');
     }
}
