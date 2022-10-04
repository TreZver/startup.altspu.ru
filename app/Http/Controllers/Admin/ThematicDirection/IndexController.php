<?php

namespace App\Http\Controllers\Admin\ThematicDirection;

use App\Http\Controllers\Controller;
# Model
use App\Models\ThematicDirection;
use App\Http\Requests\Admin\ThematicDirection\StoreRequest;

class IndexController extends Controller
{
   public function index(){
      $ThematicDirection = ThematicDirection::all();
      return view('admin.thematicdirection.index',compact('ThematicDirection'));
   }
   public function create()
   {
      return view('admin.thematicdirection.create');
   }

   public function edit(ThematicDirection $ThematicDirection){
      return view('admin.thematicdirection.edit', compact('ThematicDirection'));
   }

   public function update(StoreRequest $request, ThematicDirection $ThematicDirection){
      $data = $request->validated();
      $ThematicDirection->update($data);
      return redirect()->route('admin.thematicdirection.index');
   }

   public function delete(ThematicDirection $ThematicDirection){
      $ThematicDirection->delete();
      return response()->json([
         'success' => 'Record deleted successfully!'
     ]);
   }

   public function store(StoreRequest $request){
      $data = $request->validated();
      ThematicDirection::firstOrCreate($data);

      return redirect()->route('admin.thematicdirection.index');
   }

}
