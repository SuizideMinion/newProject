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

      return redirect()->route('admin.menuitem.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $SubMenuItem = SubMenuItem::where('id', $id)->first();
        return view('admin.submenuitem.edit', compact('SubMenuItem'));
    }

    public function update(Request $request, $id)
    {
        //echo $request->sort;
        //echo $request->id;
        if ( isset($request->sort) )
        {
          if ( $request->sort == 'down')
          {
            $getsecond = SubMenuItem::where('id', ">", $request->id)->orderBy('id', 'ASC')->limit('1')->first('id');
            SubMenuItem::where('id', $request->id)->update(['id' => '0']);
            SubMenuItem::where('id', $getsecond->id)->update(['id' => $request->id]);
            SubMenuItem::where('id', '0')->update(['id' => $getsecond->id]);
            return redirect()->route('admin.menuitem.index');
          }
          if ( $request->sort == 'up')
          {
            $getsecond = SubMenuItem::where('id', "<", $request->id)->orderBy('id', 'ASC')->limit('1')->max('id');
            SubMenuItem::where('id', $request->id)->update(['id' => '0']);
            SubMenuItem::where('id', $getsecond)->update(['id' => $request->id]);
            SubMenuItem::where('id', '0')->update(['id' => $getsecond]);
            return redirect()->route('admin.menuitem.index');
          }
        }
        if ( isset($request->status) )
        {
          if ( $request->status == 'off')
          {
            SubMenuItem::where('id', $request->id)->update(['status' => '0']);
            return redirect()->route('admin.menuitem.index');
          }
          if ( $request->status == 'on')
          {
            SubMenuItem::where('id', $request->id)->update(['status' => '1']);
            return redirect()->route('admin.menuitem.index');
          }
        }
        //DB::table('logs')->insert(array ('category' => 'check','created_at' => Carbon::now(), 'text' => "Hat eine Checklist Umbennant " . $checklist->name . " -> " . $request->validated()['name'] . "",'owner' => Auth::id()));
        //dd($request);
        SubMenuItem::where('id', $id)->update([
          'name' => $request->name,
          'link' => $request->link,
          'icon' => $request->icon,
          'status' => $request->status,
          'target' => $request->target,
          'menu_item_id' => $request->menu_item_id
        ]);

        return redirect()->route('admin.menuitem.index');
    }

    public function destroy($SubMenuItem)
    {
        SubMenuItem::where('id', $SubMenuItem)->delete();

        return redirect()->route('admin.menuitem.index');
    }
}
