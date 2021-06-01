<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreNewDogRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DogsController extends Controller
{
    public function index()
    {
        //dd(Dog::all());
        $DogsGroup = Dog::where('category', "0")->orderBy('name', 'ASC')->get();
        $array = [];
        foreach ($DogsGroup as $DogGroup) {
          $Dogs = Dog::where('category', $DogGroup->id)->orderBy('name', 'ASC')->get();
          //dd($Dogs);
          if ( !($Dogs)->isEmpty() ) $push = ['name' => $DogGroup->name, 'category' => 'true', 'id' => $DogGroup->id];
          else $push = ['name' => $DogGroup->name, 'category' => 'false', 'id' => $DogGroup->id];
          array_push($array, $push);
          $x = 1;
          foreach ($Dogs as $Dog) {
            //dd($test);
            $length = count($Dogs);
            if($x === 1) $category = 'FIRST';
            else $category = 'NEXT';
            if($x === $length) $category = 'LAST';
            if($length === 1) $category = 'OWN';

            $push = ['name' => $Dog->name, 'category' => $category, 'id' => $Dog->id];
            array_push($array, $push);
            $x++;
          }
        }
        //dd($array);
        return view('admin.dog.index', compact('array', 'DogsGroup'));
    }public function public()
    {
        //dd(Dog::all());
        $DogsGroup = Dog::where('category', "0")->orderBy('name', 'ASC')->get();
        $array = [];
        foreach ($DogsGroup as $DogGroup) {
          $Dogs = Dog::where('category', $DogGroup->id)->orderBy('name', 'ASC')->get();
          //dd($Dogs);
          if ( !($Dogs)->isEmpty() ) $push = ['name' => $DogGroup->name, 'category' => 'true', 'id' => $DogGroup->id];
          else $push = ['name' => $DogGroup->name, 'category' => 'false', 'id' => $DogGroup->id];
          array_push($array, $push);
          $x = 1;
          foreach ($Dogs as $Dog) {
            //dd($test);
            $length = count($Dogs);
            if($x === 1) $category = 'FIRST';
            else $category = 'NEXT';
            if($x === $length) $category = 'LAST';
            if($length === 1) $category = 'OWN';

            $push = ['name' => $Dog->name, 'category' => $category, 'id' => $Dog->id];
            array_push($array, $push);
            $x++;
          }
        }
        //dd($array);
        return view('admin.dog.public', compact('array', 'DogsGroup'));
    }

    public function create()
    {
        //
    }

    public function store(StoreNewDogRequest $request, Dog $dog)
    {
        Dog::create($request->validated());
        DB::table('logs')->insert(array ('category' => 'dogs','created_at' => Carbon::now(), 'text' => "hat einen Neuen Hund eingetragen ",'owner' => Auth::id()));

        return redirect()->route('admin.dogs.index');
    }

    public function show(Dog $dog)
    {
        //
    }

    public function edit(Dog $dog)
    {
        //
    }

    public function update(Request $request, Dog $dog)
    {
        //
    }

    public function destroy(Dog $dog)
    {
        //
    }
}
