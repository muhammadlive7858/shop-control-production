<?php

namespace App\Http\Controllers;

use App\Models\Sotuv_Royxati;
use Illuminate\Http\Request;

class Sotuvlar extends Controller
{
    public function index(){
        $sotuv = Sotuv_Royxati::all();
        return view('sotuvlar.index',compact('sotuv'));
    }
    public function edit($id){
        $sotuv = Sotuv_Royxati::all()->where('id',$id);
        return view('sotuvlar.edit',compact('sotuv'));
    }
    public function update($id,Request $request){
        $edit = Sotuv_Royxati::find($id);
        $update = $edit->update($request->input());
        if($update){
            return redirect()->route('sotuvlar');
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id){
        $delete = Sotuv_Royxati::find($id);
        $delete = $delete->delete();
        return redirect()->route('sotuvlar');
    }
}
