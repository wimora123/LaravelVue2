<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function upload($id, Request $request){
        $user = User::find($id);

        // Nama formData yang ditentukan di file UploadFoto.vue
        $imageName = time().'.'.$request->photo->extension();
        $path = public_path('images');

        if($user->photo && file_exists($path.'/'.$user->photo)){
            unlink($path.'/'.$user->photo);
        }

        $user->photo = $imageName;
        $user->save();

        $request->photo->move(public_path('images'), $imageName);

        return response()->json([
            "status"=>true,
            "message" => "Photo berhasil diupload"
        ]);
    }
}
