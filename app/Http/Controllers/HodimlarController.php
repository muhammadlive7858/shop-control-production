<?php

namespace App\Http\Controllers;

use App\Models\Hodimlar;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class HodimlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);
        if($store){
            return redirect()->route('users.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hodimlar  $hodimlar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hodimlar  $hodimlar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user = User::all()->where('id',$id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hodimlar  $hodimlar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $update = $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);
        if($update){
            return redirect()->route('users.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hodimlar  $hodimlar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back();
    }
}
