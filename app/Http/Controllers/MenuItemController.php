<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\admin\MenuItem;
use App\Http\Requests\StoreMenuItemRequest;

class MenuItemController extends Controller
{
    public function index(MenuItem $MenuItems)
    {
        return view('admin.menuitem.index', compact('MenuItems'));
    }

    public function create()
    {
        return view('admin.menuitem.create');
    }

    public function store(StoreMenuItemRequest $request)
    {
      MenuItem::create($request->validated());
      DB::table('logs')->insert(array ('category' => 'Menu','created_at' => Carbon::now(), 'text' => "Hat einen Neuen Menueintrag Erstellt " . $request->validated()['name'] . "",'owner' => Auth::id()));

      return redirect()->route('admin.menuitem.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
