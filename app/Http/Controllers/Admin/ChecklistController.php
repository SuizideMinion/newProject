<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChecklistController extends Controller
{
     public function create(ChecklistGroup $checklistGroup): View
     {
         return view('admin.checklists.create', compact('checklistGroup'));
     }

     public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup): RedirectResponse
     {
       // dd($checklistGroup->name);
        DB::table('logs')->insert(array ('created_at' => Carbon::now(), 'text' => "Hat eine neue Checklist Erstellt " . $checklistGroup->name . " -> " . $request->validated()['name'] . "",'owner' => Auth::id()));
         $checklistGroup->checklists()->create($request->validated());

         return redirect()->route('home');
     }

    public function show($id)
    {
        //
    }

     public function edit(ChecklistGroup $checklistGroup, Checklist $checklist): View
     {
         return view('admin.checklists.edit', compact('checklistGroup', 'checklist'));
     }

     public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist): RedirectResponse
     {
        DB::table('logs')->insert(array ('created_at' => Carbon::now(), 'text' => "Hat eine Checklist Umbennant " . $checklist->name . " -> " . $request->validated()['name'] . "",'owner' => Auth::id()));
         $checklist->update($request->validated());

         return redirect()->route('home');
     }

     public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist): RedirectResponse
     {
         $checklist->delete();
         DB::table('logs')->insert(array ('created_at' => Carbon::now(), 'text' => "Hat eine Checklist Gelöscht " . $checklistGroup->name . " -> " . $checklist->name . "",'owner' => Auth::id()));

         return redirect()->route('home');
     }
}
