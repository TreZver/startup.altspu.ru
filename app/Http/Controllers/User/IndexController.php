<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Project\ActionRequest;
use Illuminate\Support\Facades\Storage;
# Model
use App\Models\ThematicDirection;

class IndexController extends Controller
{
    public function index(){
      $id = Auth::user()->id;
      $project = \App\Models\Project::where('user_id', $id)->first();
      $participants = \App\Models\Participant::where('project_id', $project->id)->get();
      return view('user.index', compact('project','participants'));
    }

    public function edit(){
      $id = Auth::user()->id;
      $project = \App\Models\Project::where('user_id', $id)->first();
      $ThematicDirection = ThematicDirection::all();
      return view('user.edit', compact('project','ThematicDirection'));
    }

    public function new(){
      $ThematicDirection = ThematicDirection::all();
      return view('user.new',compact('ThematicDirection'));
    }

    public function actionNew(ActionRequest $request){
      $data = $request->validated();
      ini_set('upload_max_filesize', '15M');
      ini_set('post_max_size', '15M');
      if (!$request->hasFile('file')){
        $error = \Illuminate\Validation\ValidationException::withMessages([
          'Не выбран файл'
       ]);
       throw $error;
      }
      $id = Auth::user()->id;
      
      $file = $data['file'];
      $fileurl = $file->store('project');
      $data['file']    = $fileurl;
      $data['user_id'] = $id;
      $user = \App\Models\Project::firstOrCreate($data);

      return redirect()->route('user.index');
    }

    public function actionUpdate(ActionRequest $request){
      
      $data = $request->validated();
      if ($request->hasFile('file')){
        $file = $data['file'];
        $fileurl = $file->store('project');
        $data['file']    = $fileurl;
      }
      
      $id = Auth::user()->id;
      $project = \App\Models\Project::where('user_id', $id)->first();
      
      $project->update($data);

      return redirect()->route('user.index');
    }
}
