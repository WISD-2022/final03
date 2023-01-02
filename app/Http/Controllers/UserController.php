<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $info = Auth::user();
        $data = ['user'=>$info];
        #dd($data);
        return view('user.information',$data);
    }

    public function update(Request $request,$name)
    {
        $info = User::find($name);
        $info->update($request->all());
        return redirect()->route('user.edit');
    }
}
