<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\daily__business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\DailyBusinessRequest;
class Daily__BusinessController extends Controller
{
    /**  * Display a listing of the resource.*/
    public function index()
    {
        $Daily__Business=daily__business::get();
        return response()->json([
            'message' => 'Daily__Business successfully registered',
            'Daily__Business' => $Daily__Business

        ], 200);
    }
    /*** Show the form for creating a new resource.*/
    public function create() {}
    /*** Store a newly created resource in storage.*/
    public function store(DailyBusinessRequest $request)
    {
                $Daily__Business = daily__business::create(
                    array_merge(
                        $request->validated(),
                         [


                        ] )  );

                if($Daily__Business){
                        return response()->json([
                            'message' => 'Daily__Business successfully registered',
                            'Daily__Business' => $Daily__Business,
                        ], 201);}
                        return response()->json([
                            'message' => 'Daily__Business nut successfully registered',
                            'Daily__Business' => null
                        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Daily_Business $daily_Business)
    {
        $Daily__Business = Daily__Business::find($id);
        if($Daily__Business){
            return response()->json([
                'message' => 'Daily__Business not id successfully registered',
                'Daily__Business' => $Daily__Business
            ], 201);
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daily_Business $daily_Business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daily_Business $daily_Business)
    {
        $validator = Validator::make($request->all(), [
            'from_surah'=>'required|digits:2',
                    'from_ayah'=>'required|digits:2',
                    'to_surah'=>'required|digits:2',
                    'to_ayah'=>'required|digits:2',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $daily__business = daily__business::find($id);
        if(!$daily__business){
            return response()->json([
                'message' => 'daily__business not id successfully registered',
                'daily__business' => $daily__business
            ], 201);
                }
        $daily__business->update(
            array_merge(
                    $validator->validated(),
                    ['id_student'=>$request->id_student,
                         'id_atendances'=>$request->id_atendances,
                    ]));
            if($daily__business){return response()->json([
                'message' => 'daily__business successfully registered',
                'daily__business' => $daily__business  ], 201);}
            else{ return response()->json([
            'message' => 'daily__business not successfully registered',
            'daily__business' => $daily__business
        ], 400);}
    }

    /**
     * Remove the specified resource from storageDaily_Business $daily_Business.
     */
    public function destroy(string $id)
    {
        $daily__business = daily__business::find($id);
        if(!$daily__business){
            return response()->json([
                'message' => 'daily__business not id successfully registered',
                'daily__business' => $daily__business
            ], 201);
                }

        $daily__business->delete($id);
            if($daily__business){return response()->json([
                'message' => 'daily__business successfully registered',
                'daily__business' => $daily__business
            ], 201);}
        return response()->json([
            'message' => 'daily__business not successfully registered',
            'daily__business' => $daily__business
        ], 400);
    }
}
