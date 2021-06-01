<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\users\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index($id = '@')
    {
        $users = User::orderBy('name', 'asc')->paginate(15);
        $buchstaben = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ß @";
        $array = explode(" ", $buchstaben);
        $arrays = [];
        foreach ($array as $key) {
          if($key != "@") $counter = User::where('name','LIKE',"{$key}%")->count();
          else $counter = User::all()->count();
          array_push($arrays, $counter);
        }
        return view('admin.users.index', compact('users', 'arrays', 'array', 'id'));
    }

    public function updateBanReason(UpdateUserRequest $request, $usr)
    {
      //dd($request->validated()['reason']);
      $banuser = DB::table('users')->where('id', $usr)->first();
       DB::table('logs')->insert(array ('category' => 'user','created_at' => Carbon::now(), 'text' => "Hat den Ban gegen ". $banuser->name ." Begründet: " . $request->validated()['reason'],'owner' => Auth::id()));
       User::where('id', $usr)->update([
       'reason' => $request->validated()['reason']
       ]);

        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
          if($id != "@") $users = User::where('name','LIKE',"{$id}%")->paginate(15);
          else $users = User::all();
          $buchstaben = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ß @";
          $array = explode(" ", $buchstaben);
          $arrays = [];
          foreach ($array as $key) {
            if($key != "@") $counter = User::where('name','LIKE',"{$key}%")->count();
            else $counter = User::all()->count();
            array_push($arrays, $counter);
          }
          return view('admin.users.index', compact('users', 'arrays', 'array', 'id'));
    }

    public function destroy($usr)
    {
        $banuser = DB::table('users')->where('id', $usr)->first();
         DB::table('logs')->insert(array ('category' => 'user','created_at' => Carbon::now(), 'text' => "Hat ". $banuser->name ." Gebannt ",'owner' => Auth::id()));
          User::where('id', $usr)->update([
          'closed' => '1'
          ]);
          return redirect()->route('admin.users.index');
    }

    public function unlockUser($usr)
    {
        $banuser = DB::table('users')->where('id', $usr)->first();
        DB::table('logs')->insert(array ('category' => 'user','created_at' => Carbon::now(), 'text' => "Hat ". $banuser->name ." Entbannt ",'owner' => Auth::id()));
        User::where('id', $usr)->update([
          'closed' => '0',
          'reason' => '0'
        ]);

        return redirect()->route('admin.users.index');
    }
}
