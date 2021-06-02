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
        $MenuItem = MenuItem::where('id', $id)->first();
        return view('admin.menuitem.edit', compact('MenuItem'));
    }

    public function update(Request $request, $id)
    {
        if ( isset($request->status) )
        {
          if ( $request->status == 'off')
          {
            MenuItem::where('id', $request->id)->update(['status' => '0']);
            return redirect()->route('admin.menuitem.index');
          }
          if ( $request->status == 'on')
          {
            MenuItem::where('id', $request->id)->update(['status' => '1']);
            return redirect()->route('admin.menuitem.index');
          }
        }
        MenuItem::where('id', $id)->update([
          'name' => $request->name,
          'link' => $request->link,
          'icon' => $request->icon,
          'status' => $request->status,
          'target' => $request->target,
          'menu' => $request->menu
        ]);

        return redirect()->route('admin.menuitem.index');
    }

    public function destroy($MenuItem)
    {
        MenuItem::where('id', $MenuItem)->delete();

        return redirect()->route('admin.menuitem.index');
    }

}
