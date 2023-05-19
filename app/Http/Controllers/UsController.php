<?php

namespace App\Http\Controllers;

use App\Models\Us;
use App\Http\Requests\StoreUsRequest;
use App\Http\Requests\UpdateUsRequest;

class UsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Us  $us
     * @return \Illuminate\Http\Response
     */
    public function show(Us $us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Us  $us
     * @return \Illuminate\Http\Response
     */
    public function edit(Us $us)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsRequest  $request
     * @param  \App\Models\Us  $us
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsRequest $request, Us $us)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Us  $us
     * @return \Illuminate\Http\Response
     */
    public function destroy(Us $us)
    {
        //
    }
}
