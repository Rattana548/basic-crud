<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typepet;
use Illuminate\Support\Facades\Auth;


class TypepetController extends Controller
{
    function index(){
        $bin = Typepet::onlyTrashed()->get();
        $typepet = Typepet::paginate(3);
        return view('admin.typepet.index')
        ->with('typepet',$typepet)
        ->with('bin',$bin);
    }

    function insert(Request $req){
        $req->validate([
            'type_name'=>'required|unique:typepets|max:254',
        ]);

        $tpyepet = new Typepet;
        $tpyepet->type_name = $req->type_name;
        $tpyepet->user_id = Auth::user()->id;
        $tpyepet->save();

        return redirect()->route('typepet')->with('success','Insert Typepet Success');

    }

    function edit($id){
        $typepet = Typepet::find($id);
        return view('admin.typepet.edit')->with('typepet',$typepet);
    }

    function update(Request $req,$id){
        $req->validate([
            'type_name'=>'required|max:254',
        ]);

        $tpyepet = Typepet::find($id);
        $tpyepet->type_name = $req->type_name;
        $tpyepet->user_id = $req->user_id;
        $tpyepet->save();

        return redirect()->route('typepet')->with('success','Update Typepet Success');

    }

    function softdelete($id){
        $typepet = Typepet::find($id)->delete();
        return redirect()->route('typepet')->with('success','Move to bin Success');
    }

    function bin(){
        $bin = Typepet::onlyTrashed()->paginate(3);
        return view('admin.typepet.bin')->with('bin',$bin);
    }


    function restore($id){
        $restore = Typepet::withTrashed()->find($id)->restore();
        return redirect()->route('bin')->with('success','Restore Success');
    }

    function delete($id){
        $delete = Typepet::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('bin')->with('success','Delete Success');
    }
}
