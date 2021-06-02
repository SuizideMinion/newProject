<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\admin\SubMenuItem;
use App\Models\admin\MenuItem;
use App\Http\Requests\StoreSubMenuItemRequest;

class SubMenuItemsController extends Controller
{
    public function index(SubMenuItem $MenuItems)
    {
        return view('admin.submenuitem.index', compact('MenuItems'));
    }

    public function create()
    {
        return view('admin.submenuitem.create');
    }

    public function store(StoreSubMenuItemRequest $request)
    {
      SubMenuItem::create($request->validated());
      DB::table('logs')->insert(array ('category' => 'Menu','created_at' => Carbon::now(), 'text' => "Hat einen Neuen SubMenueintrag Erstellt " . $request->validated()['name'] . "",'owner' => Auth::id()));

      return redirect()->route('admin.submenuitem.index');
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
