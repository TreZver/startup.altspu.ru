<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class IndexController extends Controller
{
   public function index(){
      $ar = \App\Models\Project::where([
         'status' => 3
      ])->get();
      $like = \App\Models\ProjectLike::all();
      return view('projects.index',[
         'project' => $ar,
         'like'    => $like
      ]);
   }
   public function getListLike(){
      $ttt = \App\Models\ProjectLike::select(['element_id'])
      ->groupBy('element_id')
      ->get();
      return $ttt->toJson();
   }
   public function setLike(Request $request){
      $id = intval($request->id);
      return json_encode(\App\Models\ProjectLike::setLike($id));
   }
}
