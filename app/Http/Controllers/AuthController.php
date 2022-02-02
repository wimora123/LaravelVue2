<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function index(){
        $users = User::all();
        // Vue JS butuh baca data
        return response()->json($users);
    }

    public function show($id){
        $user = User::find($id);
        return response()->json($user);
    }

    public function store(Request $request){
        
        // $validated = $request->validate([
        //     'name' => 'required|min:3|max:70',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6|max:70'
        // ]);

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);

        //  $user->save();

        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:70',
            'email' => 'required|email',
            'password' => 'required|min:6|max:70'
        ]);

        if($validation->fails()) {
            return response()->json([
                "status"=> false,
                "message"=> $validation->errors()
             ],403);
        }


        // Mass assignment artinya sisipkan banyak kolom dengan create, tapi harus kasih $fillable di file model User atau akan error 
        // Mass assignment mencegah agar orang tidak berkepentingan tidak dapat nambah data
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);


        return response()->json([
           "status"=> true,
           "message"=> 'Data berhasil ditambah',
           "data" =>  $user
        ]);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response()->json([
            "status" => true,
            "message"=> 'Data berhasil dihapus'
        ]);
    }

    public function update(Request $request, $id){
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:70',
            'email' => 'required|email'
        ]);

        if($validation->fails()) {
            return response()->json([
                "status"=> false,
                "message"=> $validation->errors()
             ],403);
        }

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            "status" => true,
            "message"=> 'Data berhasil diupdate'
        ]);
    }

}
