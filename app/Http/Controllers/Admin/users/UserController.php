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

        return view('admin.users.index', compact('users'));
    }

    public function destroy(): RedirectResponse
    {
        $checklist->delete();

        return redirect()->route('home');
    }
}
