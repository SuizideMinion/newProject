<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Http\Requests\UpdateChecklistGroupRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChecklistGroupController extends Controller
{
     public function create(): View
     {
         return view('admin.checklist_groups.create');
     }

     public function store(StoreChecklistGroupRequest $request): RedirectResponse
     {
       ChecklistGroup::create($request->validated());
       DB::table('logs')->insert(array ('created_at' => Carbon::now(), 'text' => "Hat eine neue ChecklistGroup Erstellt " . $request->validated()['name'] . "",'owner' => Auth::id()));

       return redirect()->route('home');
     }

     public function edit(ChecklistGroup $checklistGroup): View
     {
         return view('admin.checklist_groups.edit', compact('checklistGroup'));
     }

     public function update(UpdateChecklistGroupRequest $request, ChecklistGroup $checklistGroup): RedirectResponse
     {
        DB::table('logs')->insert(array ('created_at' => Carbon::now(), 'text' => "Hat eine ChecklistGroup Umbennant " . $checklistGroup->name . " -> " . $request->validated()['name'] . "",'owner' => Auth::id()));
         $checklistGroup->update($request->validated());

         return redirect()->route('home');
     }

     public function destroy(ChecklistGroup $checklistGroup): RedirectResponse
     {
         $checklistGroup->delete();
         DB::table('logs')->insert(array ('created_at' => Carbon::now(), 'text' => "Hat eine ChecklistGroup Gelöscht " . $checklistGroup->name . "",'owner' => Auth::id()));

         return redirect()->route('home');
     }
}
