<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\users\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $buchstaben = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z Ä Ü Ö ß all";
        $array = explode(" ", $buchstaben);
        $arrays = [];
        foreach ($array as $key) {
          if($key != "all") $counter = User::where('name','LIKE',"{$key}%")->count();
          else $counter = User::all()->count();
          array_push($arrays, $counter);
        }
        return view('admin.users.index', compact('users', 'arrays', 'array'));
    }

    public function destroy(): RedirectResponse
    {
        $checklist->delete();

        return redirect()->route('home');
    }
    public function show($id)
    {
          if($id != "all") $users = User::where('name','LIKE',"{$id}%")->get();
          else $users = User::all();
          $buchstaben = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z Ä Ü Ö ß all";
          $array = explode(" ", $buchstaben);
          $arrays = [];
          foreach ($array as $key) {
            if($key != "all") $counter = User::where('name','LIKE',"{$key}%")->count();
            else $counter = User::all()->count();
            array_push($arrays, $counter);
          }
          return view('admin.users.index', compact('users', 'arrays', 'array'));
    }
}
