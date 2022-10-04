<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

# Model
use App\Models\ThematicDirection;

class IndexController extends Controller
{
    public function __invoke(){
        $ThematicDirection = ThematicDirection::all();
        return view('main.index',compact('ThematicDirection'));
    }
}
