<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\type_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
     { $type=DB::table('type_users')->git();
      return $type;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view:'user.indexs');
    //  return   $type=type_user::with('usss')->find(1);

    // //return $type->usss;
    // // foreach($type->usss as $usss){
    // //     //return $usss->id;
    // //     // dd($usss->id);
    // //     echo $usss->id ;
    // // }
    // // }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validato=validator::make($request->all(),[
            'name'=>'required|varchar|max:255|unique',]);
            if($validato->fails()){
                return $this->apiResponse(null, $validato->errors(),status:402);
            }
        $users=new type_user();
        $users->type_users=$request->input('type_users');
             $users->save();
             if($users){
                return response()->json([
                    'message' => 'User successfully registered',
                    'user' => $users
                ], 200);

                }
                return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $posts =user::find(2);
        return $posts->type_user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type_user $type_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, type_user $type_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type_user $type_user)
    {
       
    }
}
