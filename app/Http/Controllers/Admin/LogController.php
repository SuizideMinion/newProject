<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Log;
use App\User;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
  public function index()
  {
      $logs = Log::limit(30)->offset(0)->orderBy('id', 'DESC')->get();
      return view('admin.logs.index', compact('logs'));
  }
    public function show($id)
    {
        $logs = Log::where('category', $id)->limit(30)->offset(0)->orderBy('id', 'DESC')->get();
        return view('admin.logs.index', compact('logs'));
    }
}
