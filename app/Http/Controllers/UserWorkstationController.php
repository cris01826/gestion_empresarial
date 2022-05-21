<?php

namespace App\Http\Controllers;

use App\Models\User_Workstation;
use App\Http\Requests\StoreUser_WorkstationRequest;
use App\Http\Requests\UpdateUser_WorkstationRequest;

class UserWorkstationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_WorkstationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_WorkstationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Workstation  $user_Workstation
     * @return \Illuminate\Http\Response
     */
    public function show(User_Workstation $user_Workstation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_WorkstationRequest  $request
     * @param  \App\Models\User_Workstation  $user_Workstation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_WorkstationRequest $request, User_Workstation $user_Workstation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Workstation  $user_Workstation
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Workstation $user_Workstation)
    {
        //
    }
}
