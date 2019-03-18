<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function anyData(){
        $users=User::all();
        return view('users.index',compact('users'));
    }
    public function create(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->password=bcrypt($request->password);
        $user->email=$request->email;
        $user->save();
        return(redirect(route('users.data')));
    }
    public function  addForm(){
        return view('users.add');
    }
    public function update(){

    }
    public function show($id){
        $user=User::find($id)->first();
        return view('users.show',compact('user'));
    }
    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return(redirect(route('users.data')));
    }
}
