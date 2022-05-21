<?php

namespace App\Http\Controllers;

use App\Models\User_Collaborators;
use App\Http\Requests\StoreUser_CollaboratorsRequest;
use App\Http\Requests\UpdateUser_CollaboratorsRequest;

class UserCollaboratorsController extends Controller
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
     * @param  \App\Http\Requests\StoreUser_CollaboratorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_CollaboratorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Collaborators  $user_Collaborators
     * @return \Illuminate\Http\Response
     */
    public function show(User_Collaborators $user_Collaborators)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_CollaboratorsRequest  $request
     * @param  \App\Models\User_Collaborators  $user_Collaborators
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_CollaboratorsRequest $request, User_Collaborators $user_Collaborators)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Collaborators  $user_Collaborators
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Collaborators $user_Collaborators)
    {
        //
    }
}
