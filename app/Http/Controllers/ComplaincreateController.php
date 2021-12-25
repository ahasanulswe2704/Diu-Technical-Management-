<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complain;
use Validator;
use DB;

class ComplaincreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $complain = Complain::all();
        return view('student.complainbox',compact('complain'));
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
         $cmpln = new Complain;

         $cmpln->std_id = $request->input('std_id');
         $cmpln->std_name = $request->input('std_name');
         $cmpln->email = $request->input('email');
         $cmpln->email = $request->input('email');
         $cmpln->phone = $request->input('phone');
         $cmpln->room = $request->input('room');
         $cmpln->status = $request->input('status');
         $cmpln->complain_dtls = $request->input('complain_dtls');
         $cmpln->usr_id = auth()->user()->id;
         
        $cmpln->save();
        $complain = Complain::all();

     return view('student.complainbox', compact('complain'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
