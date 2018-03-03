<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
use App\requestfrom;
class requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $getrequest=requestfrom::all();
        $getid=auth::user()->id;
       
        $getrequest=DB::table('requestfroms')
            ->where('toid',$getid)
            ->leftJoin('students', 'requestfroms.bid', '=', 'students.user_id')
            ->get();


         
        // $getdatafromid=DB::table('students')
        //     ->where('user_id','2')
        //     ->get();

        // return $getrequest->all();
        return response()->json([
            'requestdata'=>$getrequest
        ]);
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
        $myid=auth::user()->id;
        \Log::info($id);
        DB::table('requestfroms')
            ->where('bid',$id)
            ->where('toid',$myid)
            ->delete();
    }
}