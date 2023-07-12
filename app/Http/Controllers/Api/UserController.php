<?php
namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\UsersRequest;
// use App\Http\Resources\Userreso;

class UserController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {  $users=user::with('students')->get();
        return response()->json(['message' => 'User successfully registered','user' => $users], 200);
    }
    /*** Show the form for creating a new resource.*/
    public function create(Request $request) {}
    /*** Store a newly created resource in storage.*/


    public function store(UsersRequest $request)
    {$user = User::create($request->validated(),['password' => bcrypt($request->password)]);
        if($user){$user->addRole($request->user_role);
             return response()->json([
            'message' => 'User successfully registered','user' => $user], 201);
             }
        else{ return response()->json([
            'message' => 'User not successfully registered','user' => null], 201);}
    }
    public function show(string $id)
    {   $users=userreso ::collection(user::with('students')->get());
        return $this->apiResponse($users, message:"ko" ,status:200);

        // if($user){return response()->json(['message' => 'User not id successfully registered',
        //         'user' => $user], 201);}
    }
    public function edit(string $id) {}

    public function update(UsersRequest $request, $id) {
        $user = User::find($id);
        if(!$user){ return response()->json(['message' => 'User not id successfully registered',
                'user' => $user], 201);}
        $user->update($request->validated,['password' => bcrypt($request->password)]);
        if($user){   return response()->json([
            'message' => 'User successfully registered','user' => $user  ], 201);    }
        else{ return response()->json([
            'message' => 'User not successfully registered','user' => null], 401);}
    }
    public function destroy(string $id)
    { $user = User::find($id);
        if(!$user){ return response()->json(['message' => 'User not id successfully registered',
            'user' => $user], 201);}
        $user->delete($id);
        if($user){   return response()->json([
            'message' => 'User successfully registered','user' => $user  ], 201);    }
        else{ return response()->json([
            'message' => 'User not successfully registered','user' => null], 401);}
    }
    public function deleteTruncate(string $id)
    {
        $user = User::Truncate();;
        if($user){   return response()->json([
            'message' => 'User successfully registered','user' => $user  ], 201);    }
        else{ return response()->json([
            'message' => 'User not successfully registered','user' => null], 401);}
    }
}
