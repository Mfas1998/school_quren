<?php

namespace App\Http\Controllers;

use App\Models\sex;
use Illuminate\Http\Request;

class SexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sex=sex::find(1);
        return $sex->quran_episades;
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sex $sex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sex $sex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sex $sex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sex $sex)
    {
        //
    }
}
