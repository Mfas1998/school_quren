<?php

namespace App\Http\Controllers\Auth;
// use App\Models\sex;
// use App\Models\sexual;
use App\Models\User;
use App\Models\guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts =guardian::all();
        return view('parent.index', compact('posts'));


        // $posts =DB::table('parents')->get();
        // return view('parent.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('parent.insert');
       $userss=user::all();
        
        return view('parent.insert',compact('userss'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        guardian::insert([
                'name'=>$request->name,
            'gender'=>$request->gender,
            'job'=>$request->job,
            'link_kinship'=>$request->link_kinship,
            'social_status'=>$request->social_status,
            'users_id'=>$request->users_id,]);

        //  return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('parent.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(guardian $parents)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post=guardian::find($post);
        $userss=user::all();

        return view( 'parent.edit', compact('userss','post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $userss=user::find($request->users_id);
        // $type_users=sex::find($request->sex_id);
        // $type_users=sexual::find($request->sexual_id);
        guardian::where('id',$id)->update([
            'name'=>$request->name,
        'gender'=>$request->gender,
        'job'=>$request->job,
        'link_kinship'=>$request->link_kinship,
        'social_status'=>$request->social_status,
        'users_id'=>$request->users_id,]);
        //  $type_users= DB::table(table:'parents')->where('id',$id)->update([
        //     'Name_parents'=>$request->Name_parents,

        //     'Phone'=>$request->Phone,
        //     'identtity_id'=>$request->identtity_id,
        //     'Number_identity'=>$request->Number_identity,
        //     'sex_id'=>$request->sex_id,
        //     'sexual_id'=>$request->sexual_id,
        //     // 'Email'=>$request->Email,
        //     'Job'=>$request->Job,
        //     'link_kinship'=>$request->link_kinship,
        //     'Social_status'=>$request->Social_status,
        //           ]);


            //  return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('parent.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('guardian')->where( 'id',$id)->delete();
        return redirect()->route('parent.index');
    }
    public function deleteTruncate(){
        DB::table(table:'guardian')->Truncate();
        return redirect()->route('parent.index');

     }



}
