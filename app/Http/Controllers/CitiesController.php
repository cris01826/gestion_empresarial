<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Http\Requests\StoreCitiesRequest;
use App\Http\Requests\UpdateCitiesRequest;
use Illuminate\Http\Request;
class CitiesController extends Controller
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
    public function cityByDepartment(Request $request){

        $department = $request->get('id');
        $cities = Cities::where('id_department',$department)
                    ->orderBy('name_city')
                    ->get();
        return response(json_encode($cities),200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function show(Cities $cities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCitiesRequest  $request
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCitiesRequest $request, Cities $cities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cities $cities)
    {
        //
    }
}
