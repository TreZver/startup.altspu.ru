<?php

namespace App\Http\Controllers\User\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Participant\ActionRequest;
use Illuminate\Support\Facades\Storage;
# Model
use App\Models\ThematicDirection;

class IndexController extends Controller
{
  public function index($id){
    $user_id = Auth::user()->id;
    $project = \App\Models\Project::where('user_id', $user_id)->first();
    $Participant = \App\Models\Participant::where(
      [
        'project_id'=> $project->id,
        'id'        => $id
        ]
    )->first();
    if (!$Participant){
      return view('errors.404');
    }
    return view('user.participant.index' ,compact('Participant'));
  }

  public function new(){
    return view('user.participant.new');
  }
  public function edit($id){
    $user_id = Auth::user()->id;
    $project = \App\Models\Project::where('user_id', $user_id)->first();
    $Participant = \App\Models\Participant::where(
      [
        'project_id'=> $project->id,
        'id'        => $id
        ]
    )->first();
    if (!$Participant){
      return view('errors.404');
    }
    return view('user.participant.edit' ,compact('Participant'));
  }
  public function actionNew(ActionRequest $request){
    $id = Auth::user()->id;
    $project = \App\Models\Project::where('user_id', $id)->first();
    $data = $request->validated();

    $data['project_id'] = $project->id;      

    $Participant = \App\Models\Participant::firstOrCreate($data);

    return redirect()->route('user.index');
  }
  public function actionUpdate(ActionRequest $request,int $id){

    $user_id = Auth::user()->id;
    $project = \App\Models\Project::where('user_id', $user_id)->first();
    $Participant = \App\Models\Participant::where(
      [
        'project_id'=> $project->id,
        'id'        => $id
        ]
    )->first();
    $data = $request->validated();
    

    $Participant->update($data);
    
    return redirect()->route('user.index');
  }
  public function actionDelete(int $id){
    $user_id = Auth::user()->id;
    $project = \App\Models\Project::where('user_id', $user_id)->first();
    $Participant = \App\Models\Participant::where(
      [
        'id'         => $id,
        'project_id' => $project->id
        ]
    )->first();
    if ($Participant == null){
      die("Данной записи не существует");
    }

    $Participant->delete();

    return redirect()->route('user.index');
  }
}
