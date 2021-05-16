<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ChecklistController extends Controller
{
     public function create(ChecklistGroup $checklistGroup): View
     {
         return view('admin.checklists.create', compact('checklistGroup'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup): RedirectResponse
     {
         $checklistGroup->checklists()->create($request->validated());

         return redirect()->route('home');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(ChecklistGroup $checklistGroup, Checklist $checklist): View
     {
         return view('admin.checklists.edit', compact('checklistGroup', 'checklist'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist): RedirectResponse
     {
         $checklist->update($request->validated());

         return redirect()->route('home');
     }

     public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist): RedirectResponse
     {
         $checklist->delete();

         return redirect()->route('home');
     }
}
