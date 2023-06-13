<?php

namespace App\Http\Controllers;
use App\Models\type_user;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users =user::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $type_users=type_user::all();
        return view( 'user.insert',compact('type_users'));
    }
    public function store(Request $request)
    {
    DB::table(table:'users')->insert([


            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'password2'=>$request->password2,
            'type_user_id'=>$request->type_user_id,
        ]);

        return response(content: 'تم الاضافة بنجاح');
    //    return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $posts = user:
        // ser.softDelete', compact('posts'));


        // return $posts;
        // return view('user.softDelete', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $uses)
    {
    $uses=user::find($uses);
        $type_users=type_user::all();
        return view( 'user.edit', compact('uses','type_users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $type_users=DB::table(table:'users')->where('id',$id)->update([
           'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'password2'=>$request->password2,
            'type_user_id'=>$request->type_user_id,
            ]);
            $type_users=type_user::find($request->type_user_id);
            //  return response(content: 'تم الاضافة بنجاح');مخ0-لفلا ىة
      return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table(table:'users')->where( 'id',$id)->delete();
        return redirect()->route('user.index');
    }
    public function deleteTruncate(){
        DB::table(table:'users')->Truncate();
        return redirect()->route('user.index');
     }
     public function restore($id)
     {
         DB::table(table:'users')->where('id',$id)->restore();
          return redirect()->back();
     }
}
