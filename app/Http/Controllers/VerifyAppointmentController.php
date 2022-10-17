<?php

namespace App\Http\Controllers;

use App\Models\VerifyAppointment;
use Illuminate\Http\Request;

class VerifyAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('scanner');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VerifyAppointment  $verifyAppointment
     * @return \Illuminate\Http\Response
     */
    public function show(VerifyAppointment $verifyAppointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VerifyAppointment  $verifyAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit(VerifyAppointment $verifyAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VerifyAppointment  $verifyAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VerifyAppointment $verifyAppointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VerifyAppointment  $verifyAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerifyAppointment $verifyAppointment)
    {
        //
    }
}
