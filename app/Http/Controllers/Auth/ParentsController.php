<?php

namespace App\Http\Controllers;
use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts =parents::all();
        return view('parent.index', compact('posts'));


        // $posts =DB::table('parents')->get();
        // return view('parent.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=sex::all();
        $types=sexual::all();
        $identity=identity::all();
        return view('parent.insert',compact('type','types','identity'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
            DB::table('parents')->insert([
            'Name_parents'=>$request->Name_parents,
            'Phone'=>$request->Phone,
            'identtity_id'=>$request->identtity_id,
            'Number_identity'=>$request->Number_identity,
            'sex_id'=>$request->sex_id,
            'sexual_id'=>$request->sexual_id,
            // 'Email'=>$request->Email,
            'Job'=>$request->Job,
            'link_kinship'=>$request->link_kinship,
            'Social_status'=>$request->Social_status,

        ]);
        //  return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('parent.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(parents $parents)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post=parents::find($post);
        $identity=identity::all();
        $type=sex::all();
        $types=sexual::all();

        return view( 'parent.edit', compact('post','identity','type','types'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $type_users=identity::find($request->identtity_id);
        $type_users=sex::find($request->sex_id);
        $type_users=sexual::find($request->sexual_id);
         $type_users= DB::table(table:'parents')->where('id',$id)->update([
            'Name_parents'=>$request->Name_parents,

            'Phone'=>$request->Phone,
            'identtity_id'=>$request->identtity_id,
            'Number_identity'=>$request->Number_identity,
            'sex_id'=>$request->sex_id,
            'sexual_id'=>$request->sexual_id,
            // 'Email'=>$request->Email,
            'Job'=>$request->Job,
            'link_kinship'=>$request->link_kinship,
            'Social_status'=>$request->Social_status,
                  ]);


            //  return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('parent.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('parents')->where( 'id',$id)->delete();
        return redirect()->route('parent.index');
    }
    public function deleteTruncate(){
        DB::table(table:'parents')->Truncate();
        return redirect()->route('parent.index');

     }



}
